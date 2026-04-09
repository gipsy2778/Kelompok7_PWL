<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/laporan', function () {
    return view('laporan');
});