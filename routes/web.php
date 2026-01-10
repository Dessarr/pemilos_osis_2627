<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('home');

// Login Page
Route::get('/login', function () {
    return view('login');
})->name('login');

// Admin Login (Public)
Route::get('/admin/masuklagi', function () {
    return view('admin.login');
})->name('admin.login');

// Auth Routes
Route::post('/login/siswa', [AuthController::class, 'loginSiswa'])->name('siswa.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Siswa Routes (Protected)
Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/kandidat', function () {
        return view('kandidat');
    })->name('kandidat');
    
    Route::get('/voting/{kandidatId}', function ($kandidatId) {
        return view('voting', ['kandidatId' => $kandidatId]);
    })->name('voting');
});

// Admin Routes (Protected)
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/data-siswa', function () {
        return view('admin.data-siswa');
    })->name('data-siswa');
    
    Route::get('/data-guru', function () {
        return view('admin.data-guru');
    })->name('data-guru');
    
    Route::get('/export/pdf', [AdminController::class, 'exportPdf'])->name('export.pdf');
    Route::get('/export/csv', [AdminController::class, 'exportCsv'])->name('export.csv');
});
