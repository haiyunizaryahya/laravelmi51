<?php

use App\Http\Controllers\DetailPerawatanController;
use App\Http\Controllers\LantaiController;
use App\Http\Controllers\LaporanPerawatanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
    
});
Route::get('/dashboard', function () {
    // return view('dashboard');
    return redirect()->route('lantai.index');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::get('/lantai/{id}/edit', [LantaiController::class, 'edit'])->name('lantai.edit');
    //Route::put('/lantai/{id}', [LantaiController::class, 'update'])->name('lantai.update');
    //Route::get('/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    //Route::put('/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi.update');


    
});
Route::resource('lantai', LantaiController::class)->middleware(['auth', 'verified']);
Route::resource('lokasi', LokasiController::class)->middleware(['auth', 'verified']);
Route::resource('sarana', SaranaController::class);
Route::resource('laporan', LaporanPerawatanController::class);
Route::resource('perawatan', DetailPerawatanController::class);
Route::resource('user', UserController::class);
//Route::resource('permintaan', PermintaanController::class);
require __DIR__.'/auth.php';
