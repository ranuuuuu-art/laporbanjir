<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route LaporBanjir
// Form pelaporan terbuka untuk warga (tanpa login)
Route::get('/laporan/buat', [\App\Http\Controllers\LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [\App\Http\Controllers\LaporanController::class, 'store'])->name('laporan.store');

// Halaman pengelolaan khusus petugas (wajib login)
Route::middleware('auth')->group(function () {
    Route::get('/laporan', [\App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');
});
