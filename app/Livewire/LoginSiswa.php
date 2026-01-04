<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class LoginSiswa extends Component
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

        $siswa = Siswa::where('nis', $this->nis)->first();

        if ($siswa && Hash::check($this->password, $siswa->password)) {
            Auth::guard('siswa')->login($siswa);
            return redirect()->route('kandidat');
        }

        $this->error = 'NIS atau password salah';
    }

    public function render()
    {
        return view('livewire.login-siswa');
    }
}