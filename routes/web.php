<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
      Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

   Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::put('/barang/{code}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{code}', [BarangController::class, 'destroy'])->name('barang.destroy');

 
    Route::resource('mesin', MesinController::class);
  
Route::get('mesin/export/excel', [MesinController::class, 'exportExcel'])->name('mesin.export.excel');
});