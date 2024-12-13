<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPerawatanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\LaporanPerawatanController;
use App\Http\Controllers\LaporRawatController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Role "a": Access to everything
Route::middleware(['auth', 'verified', 'checkRole:a'])->group(function () {
    Route::resource('lantai', LantaiController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('sarana', SaranaController::class);
    Route::delete('lantai/{lantai}', [LantaiController::class, 'destroy'])->name('lantai.destroy');
    Route::put('lantai/{lantai}', [LantaiController::class, 'update'])->name('lantai.update');
    Route::delete('lokasi/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
    Route::put('lokasi/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('sarana/{sarana}', [SaranaController::class, 'destroy'])->name('sarana.destroy');
    Route::put('sarana/{sarana}', [SaranaController::class, 'update'])->name('sarana.update');
    Route::resource('user', UserController::class);
});

// Role "a" and "s": Access to "jadwal" and "laporan"
Route::middleware(['auth', 'verified', 'checkRole:a,s,u'])->group(function () {
    Route::resource('jadwal', JadwalController::class)->except(['destroy', 'update']);
    
    // Hanya role 'a' dan 's' yang dapat destroy dan update
    Route::delete('jadwal/{jadwal}', [JadwalController::class, 'destroy'])
        ->name('jadwal.destroy')
        ->middleware('checkRole:a,s');
        
    Route::put('jadwal/{jadwal}', [JadwalController::class, 'update'])
        ->name('jadwal.update')
        ->middleware('checkRole:a,s');

    Route::resource('laporan', LaporRawatController::class);
});

// Role "a", "s", and "u": Access to "laporan"
Route::middleware(['auth', 'verified', 'checkRole:a,s,u'])->group(function () {
    Route::resource('laporan', LaporRawatController::class);
});

// Role "a" and "s": Access to "perawatan"
Route::middleware(['auth', 'verified', 'checkRole:a,s'])->group(function () {
    Route::resource('perawatan', DetailPerawatanController::class);
});

require __DIR__.'/auth.php';
