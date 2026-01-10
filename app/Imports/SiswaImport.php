<?php

namespace App\Imports;

use App\Models\DataSiswaTemp;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class SiswaImport implements ToCollection, WithStartRow
{
    /**
     * Start reading from row 3 (row 1 empty, row 2 is header, row 3 is first data)
     */
    public function startRow(): int
    {
        return 3;
    }

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $imported = 0;
        $skipped = 0;

        foreach ($rows as $row) {
            // Convert row to array if it's a Collection
            $rowArray = $row instanceof Collection ? $row->toArray() : $row;
            
            // Excel columns: A=0, B=1, C=2, D=3, E=4, F=5
            // Based on Excel file: C=Nama, D=NIS, E=NISN, F=Kelas
            $nama = isset($rowArray[2]) ? trim((string)$rowArray[2]) : '';
            $nis = isset($rowArray[3]) ? trim((string)$rowArray[3]) : '';
            $nisn = isset($rowArray[4]) ? trim((string)$rowArray[4]) : '';
            $kelas = isset($rowArray[5]) ? trim((string)$rowArray[5]) : '';

            // Skip empty rows
            if (empty($nama) && empty($nis) && empty($nisn) && empty($kelas)) {
                $skipped++;
                continue;
            }

            // Skip if essential data is missing
            if (empty($nama) || empty($nis)) {
                Log::warning('Skipping row due to missing essential data', [
                    'nama' => $nama,
                    'nis' => $nis,
                    'row' => $rowArray
                ]);
                $skipped++;
                continue;
            }

            // Pad NIS to 9 characters
            $nis = str_pad($nis, 9, '0', STR_PAD_LEFT);

            // Ensure NISN is string
            if (empty($nisn)) {
                $nisn = '';
            } else {
                $nisn = (string)$nisn;
            }

            try {
                DataSiswaTemp::create([
                    'nama' => $nama,
                    'kelas' => $kelas ?: '',
                    'nis' => $nis,
                    'nisn' => $nisn,
                    'has_voted' => false,
                ]);
                
                $imported++;
                
                Log::info('Imported row', [
                    'nama' => $nama,
                    'nis' => $nis,
                    'nisn' => $nisn,
                    'kelas' => $kelas
                ]);
            } catch (\Exception $e) {
                Log::error('Failed to import row', [
                    'error' => $e->getMessage(),
                    'nama' => $nama,
                    'nis' => $nis,
                    'row' => $rowArray
                ]);
                $skipped++;
            }
        }

        Log::info('Import completed', [
            'imported' => $imported,
            'skipped' => $skipped,
            'total_rows' => $rows->count()
        ]);
    }
}