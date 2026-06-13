<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SupervisorController extends Controller
{
    public function dashboard()
    {
        $jumlahTransaksi = DB::table('transaksi')->count();

        $omzet = DB::table('transaksi')->sum('total');

        $kasirAktif = DB::table('users')
            ->where('role', 'kasir')
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

    public function monitoringTransaksi()
    {
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
            ->orderByDesc('tanggal')
            ->paginate(10);

        return view(
            'supervisor.monitoring_transaksi',
            compact('transaksi')
        );
    }
    public function kasir()
    {
        $kasir = DB::table('users')
            ->where('role', 'kasir')
            ->where(
                'cabang_id',
                Auth::user()->cabang_id
            )
            ->get();

        return view(
            'supervisor.kasir',
            compact('kasir')
        );
    }

    public function laporan()
    {
        $laporan = DB::table('transaksi')
            ->where(
                'cabang_id',
                Auth::user()->cabang_id
            )
            ->selectRaw(
                'DATE(tanggal) as tanggal,
                COUNT(*) as jumlah_transaksi,
                SUM(total) as omzet'
            )
            ->groupBy('tanggal')
            ->orderByDesc('tanggal')
            ->get();

        return view(
            'supervisor.laporan_transaksi',
            compact('laporan')
        );
    }
}