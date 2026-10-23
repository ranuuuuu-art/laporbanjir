<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Halaman utama langsung ke form pelaporan (bebas diakses warga)
Route::get('/', function () {
    return redirect()->route('laporan.create');
});

// Halaman form pelaporan dan proses kirim laporan (tanpa login)
Route::get('/laporan/buat', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

// Route authentication
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// Route yang wajib login (khusus petugas)
Route::middleware('auth')->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');
});