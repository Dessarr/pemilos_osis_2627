<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Murid;

class AuthController extends Controller
{
    public function loginSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'password' => 'required|string',
        ]);

        // Trim input
        $nis = trim($request->nama); // Input "nama" sebenarnya adalah NIS
        $nisn = trim($request->password); // Input "password" sebenarnya adalah NISN

        // Cari siswa berdasarkan NIS
        $murid = Murid::where('nis', $nis)->first();

        if (!$murid) {
            return back()->withErrors(['nama' => 'Nama tidak ditemukan'])->withInput()->with('error', 'Nama tidak ditemukan');
        }

        // Check password - password harus sama dengan NISN
        if ($nisn === $murid->nisn) {
            Auth::guard('siswa')->login($murid);
            return redirect()->route('kandidat');
        }

        return back()->withErrors(['password' => 'Password salah'])->withInput()->with('error', 'Password salah');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout()
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }
        
        if (session('admin_logged_in')) {
            session()->forget('admin_logged_in');
        }

        return redirect()->route('home');
    }
}