<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ManagerController extends Controller
{
    // =========================
    // DASHBOARD MANAGER
    // =========================
    public function dashboard()
    {
        $totalProduk = DB::table('produk')->count();

        $stokMenipis = DB::table('stok_cabang')
            ->where('stok', '<=', 10)
            ->count();

        $transaksiHariIni = DB::table('transaksi')
            ->whereDate('tanggal', today())
            ->count();

        $pendapatanHariIni = DB::table('transaksi')
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
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.id',
                'transaksi.kode_transaksi',
                'transaksi.tanggal',
                'transaksi.total',
                'users.name as nama_kasir'
            )
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
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.kode_transaksi',
                'transaksi.tanggal',
                'transaksi.total',
                'users.name as nama_kasir'
            )
            ->orderBy('transaksi.tanggal', 'desc')
            ->get();

        $totalPendapatan = DB::table('transaksi')
            ->sum('total');

        $totalTransaksi = DB::table('transaksi')
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
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.kode_transaksi',
                'transaksi.tanggal',
                'transaksi.total',
                'users.name as nama_kasir'
            )
            ->orderBy('transaksi.tanggal', 'desc')
            ->get();

        $totalPendapatan = DB::table('transaksi')
            ->sum('total');

        $totalTransaksi = DB::table('transaksi')
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