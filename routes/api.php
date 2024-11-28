<?php

use App\Http\Controllers\LantaiController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\SaranaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/lantai',[LantaiController::class,'getLantai']);
Route::post('/lantai',[LantaiController::class,'storeLantai']);


Route::get('/lokasi',[LokasiController::class,'getLokasi']);
Route::post('/lokasi',[LokasiController::class,'storeLokasi']);

Route::get('/sarana',[SaranaController::class,'getSarana']);
Route::post('/sarana',[SaranaController::class,'storeSarana']);




