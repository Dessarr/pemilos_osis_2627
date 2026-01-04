<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginAdmin extends Component
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

        $admin = Admin::where('nama', $this->nama)->first();

        if ($admin && Hash::check($this->password, $admin->password)) {
            session(['admin_logged_in' => true, 'admin_id' => $admin->id]);
            return redirect()->route('admin.dashboard');
        }

        $this->error = 'Nama atau password salah';
    }

    public function render()
    {
        return view('livewire.admin.login-admin');
    }
}

