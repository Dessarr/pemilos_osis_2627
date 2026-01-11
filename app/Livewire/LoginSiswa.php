<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Murid;

class LoginSiswa extends Component
{
    public $nama = '';
    public $password = '';
    public $error = '';

    public function login()
    {
        $this->validate([
            'nama' => 'required|string',
            'password' => 'required|string',
        ]);

        // Trim input
        $nis = trim($this->nama); // Input "nama" sebenarnya adalah NIS
        $nisn = trim($this->password); // Input "password" sebenarnya adalah NISN

        // Cari siswa berdasarkan NIS
        $murid = Murid::where('nis', $nis)->first();

        if (!$murid) {
            $this->error = 'Nama tidak ditemukan';
            return;
        }

        // Check password - password harus sama dengan NISN
        if ($nisn === $murid->nisn) {
            Auth::guard('siswa')->login($murid);
            return redirect()->route('kandidat');
        }

        $this->error = 'Nama atau password salah';
    }

    public function render()
    {
        return view('livewire.login-siswa');
    }
}