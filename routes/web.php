<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\DashboardController;


// Rute-rute untuk autentikasi (login, register, logout)
Auth::routes();

// Rute yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    // Halaman Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::put('/barang/{code}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{code}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Halaman Mesin
    Route::resource('mesin', MesinController::class);
});