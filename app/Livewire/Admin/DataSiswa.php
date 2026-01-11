<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Murid;
use App\Models\DataSiswaTemp;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DataSiswa extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $filterKelas = '';
    public $excelFile = null;
    public $showTempTable = false;
    
    // Filter untuk temporary table
    public $tempSearch = '';
    public $tempFilterKelas = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterKelas()
    {
        $this->resetPage();
    }

    public function updatingTempSearch()
    {
        $this->resetPage('tempPage');
    }

    public function updatingTempFilterKelas()
    {
        $this->resetPage('tempPage');
    }

    public function updatedExcelFile()
    {
        if ($this->excelFile) {
            try {
                $this->validate([
                    'excelFile' => 'required|mimes:xlsx,xls|max:10240',
                ], [
                    'excelFile.required' => 'Silakan pilih file Excel',
                    'excelFile.mimes' => 'File harus berformat .xlsx atau .xls',
                    'excelFile.max' => 'Ukuran file maksimal 10MB',
                ]);
                
                // Dispatch event to update UI
                $this->dispatch('file-selected', fileName: $this->excelFile->getClientOriginalName());
            } catch (\Illuminate\Validation\ValidationException $e) {
                throw $e;
            }
        }
    }

    public function importExcel()
    {
        if (!$this->excelFile) {
            session()->flash('error', 'Silakan pilih file Excel terlebih dahulu.');
            return;
        }

        $this->validate([
            'excelFile' => 'required|mimes:xlsx,xls|max:10240',
        ], [
            'excelFile.required' => 'Silakan pilih file Excel',
            'excelFile.mimes' => 'File harus berformat .xlsx atau .xls',
            'excelFile.max' => 'Ukuran file maksimal 10MB',
        ]);

        try {
            // Clear temp table first
            DataSiswaTemp::truncate();

            // Import to temp table - Livewire stores file in temporary location
            $filePath = $this->excelFile->getRealPath();
            Excel::import(new SiswaImport, $filePath);

            // Get count after import
            $count = DataSiswaTemp::count();
            
            $this->showTempTable = true;
            $this->excelFile = null;
            $this->resetPage();
            
            session()->flash('message', "File Excel berhasil diimport ke table temporary. {$count} data ditemukan. Silakan review data sebelum proceed.");
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengimport file: ' . $e->getMessage());
            Log::error('Import Excel Error: ' . $e->getMessage());
            Log::error('Import Excel Stack: ' . $e->getTraceAsString());
        }
    }

    public function proceedFromTemp()
    {
        try {
            DB::beginTransaction();

            $tempData = DataSiswaTemp::all();
            $inserted = 0;
            $skipped = 0;

            foreach ($tempData as $temp) {
                // Check if NIS already exists
                $existing = Murid::where('nis', $temp->nis)->first();
                
                if (!$existing) {
                    Murid::create([
                        'nama' => $temp->nama,
                        'kelas' => $temp->kelas,
                        'nis' => $temp->nis,
                        'nisn' => $temp->nisn,
                        'has_voted' => false,
                    ]);
                    $inserted++;
                } else {
                    $skipped++;
                }
            }

            // Clear temp table
            DataSiswaTemp::truncate();

            DB::commit();

            $this->showTempTable = false;
            $this->resetPage();
            
            $message = "Data berhasil dipindahkan! {$inserted} data baru ditambahkan.";
            if ($skipped > 0) {
                $message .= " {$skipped} data dilewati (NIS sudah ada).";
            }
            session()->flash('message', $message);
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Gagal memproses data: ' . $e->getMessage());
            Log::error('Proceed Temp Error: ' . $e->getMessage());
        }
    }

    public function clearTemp()
    {
        DataSiswaTemp::truncate();
        $this->showTempTable = false;
        session()->flash('message', 'Table temporary telah dibersihkan.');
    }

    public function render()
    {
        // Query untuk data siswa utama
        $murid = Murid::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nis', 'like', '%' . $this->search . '%')
                    ->orWhere('nisn', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterKelas, function ($query) {
                $query->where('kelas', $this->filterKelas);
            })
            ->orderBy('kelas')
            ->orderBy('nama')
            ->paginate(36, pageName: 'page');

        // Query untuk temporary data dengan pagination
        $tempData = DataSiswaTemp::query()
            ->when($this->tempSearch, function ($query) {
                $query->where('nama', 'like', '%' . $this->tempSearch . '%')
                    ->orWhere('nis', 'like', '%' . $this->tempSearch . '%')
                    ->orWhere('nisn', 'like', '%' . $this->tempSearch . '%');
            })
            ->when($this->tempFilterKelas, function ($query) {
                $query->where('kelas', $this->tempFilterKelas);
            })
            ->orderBy('kelas')
            ->orderBy('nama')
            ->paginate(36, pageName: 'tempPage');

        // Get kelas list dari kedua table
        $kelasList = Murid::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');
        $tempKelasList = DataSiswaTemp::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('livewire.admin.data-siswa', [
            'murid' => $murid,
            'tempData' => $tempData,
            'kelasList' => $kelasList,
            'tempKelasList' => $tempKelasList,
        ]);
    }
}

