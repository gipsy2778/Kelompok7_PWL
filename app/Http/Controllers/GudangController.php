<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GudangController extends Controller
{
    // =========================================
    // DASHBOARD GUDANG
    // =========================================
    public function dashboard()
    {
        $cabangId = Auth::user()->cabang_id;

        $totalProduk = DB::table('stok_cabang')
            ->where('cabang_id', $cabangId)
            ->count();

        $totalStok = DB::table('stok_cabang')
            ->where('cabang_id', $cabangId)
            ->sum('stok');

        $stokMenipis = DB::table('stok_cabang')
            ->where('cabang_id', $cabangId)
            ->where('stok', '<=', 10)
            ->count();

        $barangMasukHariIni = DB::table('riwayat_stok')
            ->where('cabang_id', $cabangId)
            ->where('jenis', 'masuk')
            ->whereDate('created_at', today())
            ->sum('jumlah');

        return view('gudang.dashboard', compact(
            'totalProduk',
            'totalStok',
            'stokMenipis',
            'barangMasukHariIni'
        ));
    }



    // =========================================
    // MONITORING STOK
    // =========================================
    public function stok()
    {
        $stok = DB::table('stok_cabang')
            ->join(
                'produk',
                'stok_cabang.produk_id',
                '=',
                'produk.id'
            )
            ->join(
                'cabang',
                'stok_cabang.cabang_id',
                '=',
                'cabang.id'
            )
            ->select(
                'stok_cabang.*',
                'produk.nama_produk',
                'cabang.nama_cabang'
            )
            ->where(
                'stok_cabang.cabang_id',
                Auth::user()->cabang_id
            )
            ->orderBy('produk.nama_produk')
            ->paginate(10);

        return view('gudang.stok', compact('stok'));
    }



    // =========================================
    // FORM BARANG MASUK
    // =========================================
    public function barangMasuk()
    {
        $produk = DB::table('stok_cabang')
            ->join(
                'produk',
                'stok_cabang.produk_id',
                '=',
                'produk.id'
            )
            ->where(
                'stok_cabang.cabang_id',
                Auth::user()->cabang_id
            )
            ->select(
                'produk.id',
                'produk.nama_produk'
            )
            ->distinct()
            ->orderBy('produk.nama_produk')
            ->get();

        return view('gudang.barang_masuk', compact('produk'));
    }



    // =========================================
    // FORM BARANG KELUAR
    // =========================================
    public function barangKeluar()
    {
        $produk = DB::table('stok_cabang')
            ->join(
                'produk',
                'stok_cabang.produk_id',
                '=',
                'produk.id'
            )
            ->where(
                'stok_cabang.cabang_id',
                Auth::user()->cabang_id
            )
            ->select(
                'produk.id',
                'produk.nama_produk'
            )
            ->distinct()
            ->orderBy('produk.nama_produk')
            ->get();

        return view('gudang.barang_keluar', compact('produk'));
    }



    // =========================================
    // RIWAYAT STOK
    // =========================================
    public function riwayatStok()
    {
        $riwayat = DB::table('riwayat_stok')
            ->join(
                'produk',
                'riwayat_stok.produk_id',
                '=',
                'produk.id'
            )
            ->join(
                'users',
                'riwayat_stok.user_id',
                '=',
                'users.id'
            )
            ->select(
                'riwayat_stok.*',
                'produk.nama_produk',
                'users.name'
            )
            ->where(
                'riwayat_stok.cabang_id',
                Auth::user()->cabang_id
            )
            ->orderByDesc('riwayat_stok.created_at')
            ->paginate(10);

        return view('gudang.riwayat_stok', compact('riwayat'));
    }
}