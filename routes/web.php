<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\SupervisorController;

// LOGIN
Route::get('/', [AuthController::class, 'login'])
    ->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    });
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk/tambah', [ProdukController::class, 'create']);
    Route::post('/produk/store', [ProdukController::class, 'store']);
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
    Route::get('/produk/hapus/{id}', [ProdukController::class, 'destroy']);
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/cabang/{id}', [TransaksiController::class, 'cabang']);
    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail']);
    Route::get('/laporan', [LaporanController::class, 'index']);

});

// MANAGER
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager', [ManagerController::class,'dashboard']);

    Route::get('/manager/transaksi', [ManagerController::class, 'transaksi']);

    Route::get('/manager/stok', [ManagerController::class, 'stok']);

    Route::get('/manager/laporan', function () {
        return view('manager.laporan');
    });

     Route::get('/manager/laporan', [ManagerController::class, 'laporan']);

     Route::get('/manager/laporan/pdf', [ManagerController::class, 'cetakLaporan']);

});

// ======================================
// SUPERVISOR
// ======================================

Route::middleware(['auth', 'role:supervisor'])->group(function () {

    Route::get(
        '/supervisor',
        [SupervisorController::class, 'dashboard']
    );

    Route::get(
        '/supervisor/monitoring-transaksi',
        [SupervisorController::class, 'monitoringTransaksi']
    );

    Route::get(
        '/supervisor/kasir',
        [SupervisorController::class, 'kasir']
    );

    Route::get(
        '/supervisor/laporan-transaksi',
        [SupervisorController::class, 'laporan']
    );

});

// KASIR
Route::middleware(['auth','role:kasir'])->group(function () {

    Route::get('/kasir', [KasirController::class,'dashboard']);

    Route::get('/kasir/transaksi', [KasirController::class,'transaksi']);

    Route::post('/kasir/transaksi/store', [KasirController::class,'store']);

    Route::get('/kasir/riwayat', [KasirController::class,'riwayat']);

    Route::get('/kasir/detail/{id}', [KasirController::class,'detail']);

    Route::get('/kasir/transaksi-baru', [KasirController::class, 'transaksiBaru']);

    Route::post('/kasir/pembayaran', [KasirController::class,'pembayaran']);

});

// ======================================
// GUDANG
// ======================================

Route::middleware(['auth','role:gudang'])->group(function () {

    Route::get('/gudang', [GudangController::class, 'dashboard']);

    Route::get('/gudang/stok', [GudangController::class, 'stok']);

    Route::get('/gudang/barang-masuk', [GudangController::class, 'barangMasuk']);

    Route::post(
        '/gudang/barang-masuk',
        [GudangController::class, 'simpanBarangMasuk']
    );

    Route::get('/gudang/barang-keluar', [GudangController::class, 'barangKeluar']);

    Route::post(
        '/gudang/barang-keluar',
        [GudangController::class, 'simpanBarangKeluar']
    );

    Route::get('/gudang/riwayat-stok', [GudangController::class, 'riwayatStok']);

});