<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;

class AuthController extends Controller
{
    public function loginSiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string',
        ]);

        // Trim input
        $nis = trim($request->nis);
        $password = trim($request->password);

        // Cari siswa
        $siswa = Siswa::where('nis', $nis)->first();

        if (!$siswa) {
            return back()->withErrors(['nis' => 'NIS tidak ditemukan'])->withInput()->with('error', 'NIS tidak ditemukan');
        }

        // Check password - password = NIS (tidak di-hash, langsung compare)
        if ($password === $siswa->password) {
            Auth::guard('siswa')->login($siswa);
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