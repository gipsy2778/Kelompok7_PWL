<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    // =========================
    // DASHBOARD SUPERVISOR
    // =========================
    public function dashboard()
    {
        $cabangId = Auth::user()->cabang_id;

        $jumlahTransaksi = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->count();

        $omzet = DB::table('transaksi')
            ->where('cabang_id', $cabangId)
            ->sum('total');

        $kasirAktif = DB::table('users')
            ->where('role', 'kasir')
            ->where('cabang_id', $cabangId)
            ->count();

        return view(
            'supervisor.dashboard',
            compact(
                'jumlahTransaksi',
                'omzet',
                'kasirAktif'
            )
        );
    }

    // =========================
    // MONITORING TRANSAKSI
    // =========================
    public function monitoringTransaksi()
    {
        $cabangId = Auth::user()->cabang_id;

        $transaksi = DB::table('transaksi')
            ->join(
                'users',
                'transaksi.user_id',
                '=',
                'users.id'
            )
            ->select(
                'transaksi.*',
                'users.name as nama_kasir'
            )
            ->where(
                'transaksi.cabang_id',
                $cabangId
            )
            ->orderByDesc('transaksi.tanggal')
            ->paginate(10);

        return view(
            'supervisor.monitoring_transaksi',
            compact('transaksi')
        );
    }

    // =========================
    // DATA KASIR
    // =========================
    public function kasir()
    {
        $kasir = DB::table('users')
            ->where('role', 'kasir')
            ->where(
                'cabang_id',
                Auth::user()->cabang_id
            )
            ->orderBy('name')
            ->get();

        return view(
            'supervisor.kasir',
            compact('kasir')
        );
    }

    // =========================
    // LAPORAN TRANSAKSI
    // =========================
    public function laporan()
    {
        $laporan = DB::table('transaksi')
            ->where(
                'cabang_id',
                Auth::user()->cabang_id
            )
            ->selectRaw(
                '
                DATE(tanggal) as tanggal,
                COUNT(*) as jumlah_transaksi,
                SUM(total) as omzet
                '
            )
            ->groupByRaw('DATE(tanggal)')
            ->orderByDesc('tanggal')
            ->get();

        return view(
            'supervisor.laporan_transaksi',
            compact('laporan')
        );
    }
}