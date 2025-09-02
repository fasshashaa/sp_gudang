<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/{code}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{code}', [BarangController::class, 'destroy'])->name('barang.destroy');
