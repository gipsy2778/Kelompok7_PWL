<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/produk', [ProdukController::class, 'index']);

Route::get('/transaksi', [TransaksiController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'index']);