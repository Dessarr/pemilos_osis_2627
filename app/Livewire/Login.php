<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class Login extends Component
{
    public $nis = '';
    public $password = '';
    public $error = '';

    public function login()
    {
        $this->validate([
            'nis' => 'required|string',
            'password' => 'required|string',
        ]);

        // Trim input
        $nis = trim($this->nis);
        $password = trim($this->password);

        // Cari siswa
        $siswa = Siswa::where('nis', $nis)->first();

        if (!$siswa) {
            $this->error = 'NIS tidak ditemukan';
            return;
        }

        // Check password dengan Hash::check
        if (Hash::check($password, $siswa->password)) {
            Auth::guard('siswa')->login($siswa);
            return redirect()->route('kandidat');
        }

        $this->error = 'NIS atau password salah';
    }

    public function render()
    {
        return view('livewire.login');
    }
}