<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ManagerController extends Controller
{
    // =========================
    // DASHBOARD MANAGER
    // =========================
    public function dashboard()
    {
        $cabangId = Auth::user()->cabang_id;

        $totalProduk = DB::table('stok_cabang')
            ->where('cabang_id', $cabangId)
            ->count();

        $stokMenipis = DB::table('stok_cabang')
            ->where('cabang_id', $cabangId)
            ->where('stok', '<=', 10)
            ->count();

        $transaksiHariIni = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->whereDate('tanggal', today())
            ->count();

        $pendapatanHariIni = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->whereDate('tanggal', today())
            ->sum('total');

        return view(
            'manager.dashboard',
            compact(
                'totalProduk',
                'stokMenipis',
                'transaksiHariIni',
                'pendapatanHariIni'
            )
        );
    }


    // =========================
    // MONITORING TRANSAKSI
    // =========================
    public function transaksi()
    {
        $cabangId = Auth::user()->cabang_id;

        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.id',
                'transaksi.kode_transaksi',
                'transaksi.tanggal',
                'transaksi.total',
                'users.name as nama_kasir'
            )
            ->where('transaksi.cabang_id', $cabangId)
            ->orderBy('transaksi.tanggal', 'desc')
            ->paginate(10);

        return view(
            'manager.transaksi',
            compact('transaksi')
        );
    }


    // =========================
    // MONITORING STOK
    // =========================
    public function stok()
    {
        $cabangId = Auth::user()->cabang_id;

        $produk = DB::table('stok_cabang')
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
                'produk.nama_produk',
                'cabang.nama_cabang',
                'stok_cabang.stok'
            )
            ->where('stok_cabang.cabang_id', $cabangId)
            ->orderBy('produk.nama_produk')
            ->get();

        return view(
            'manager.stok',
            compact('produk')
        );
    }


    // =========================
    // LAPORAN MANAGER
    // =========================
    public function laporan()
    {
        $cabangId = Auth::user()->cabang_id;

        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.kode_transaksi',
                'transaksi.tanggal',
                'transaksi.total',
                'users.name as nama_kasir'
            )
            ->where('transaksi.cabang_id', $cabangId)
            ->orderBy('transaksi.tanggal', 'desc')
            ->get();

        $totalPendapatan = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->sum('total');

        $totalTransaksi = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->count();

        return view(
            'manager.laporan',
            compact(
                'transaksi',
                'totalPendapatan',
                'totalTransaksi'
            )
        );
    }


    // =========================
    // CETAK PDF
    // =========================
    public function cetakLaporan()
    {
        $cabangId = Auth::user()->cabang_id;

        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.kode_transaksi',
                'transaksi.tanggal',
                'transaksi.total',
                'users.name as nama_kasir'
            )
            ->where('transaksi.cabang_id', $cabangId)
            ->orderBy('transaksi.tanggal', 'desc')
            ->get();

        $totalPendapatan = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->sum('total');

        $totalTransaksi = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->count();

        $pdf = Pdf::loadView(
            'manager.laporan_pdf',
            compact(
                'transaksi',
                'totalPendapatan',
                'totalTransaksi'
            )
        );

        return $pdf->download(
            'laporan-manager.pdf'
        );
    }
}