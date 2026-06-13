<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GudangController extends Controller
{
    public function dashboard()
    {
        return view('gudang.dashboard');
    }

    public function stok()
    {
        $stok = DB::table('stok_cabang')
            ->join('produk', 'stok_cabang.produk_id', '=', 'produk.id')
            ->join('cabang', 'stok_cabang.cabang_id', '=', 'cabang.id')
            ->get();

        return view('gudang.stok', compact('stok'));
    }

    public function barangMasuk()
    {
        return view('gudang.barang_masuk');
    }

    public function barangKeluar()
    {
        return view('gudang.barang_keluar');
    }

    public function riwayatStok()
    {
        $riwayat = DB::table('riwayat_stok')
            ->join('produk', 'riwayat_stok.produk_id', '=', 'produk.id')
            ->join('users', 'riwayat_stok.user_id', '=', 'users.id')
            ->select(
                'riwayat_stok.*',
                'produk.nama_produk',
                'users.name'
            )
            ->latest()
            ->get();

        return view('gudang.riwayat_stok', compact('riwayat'));
    }
}