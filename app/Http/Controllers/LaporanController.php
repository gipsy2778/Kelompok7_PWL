<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->join('cabang', 'transaksi.cabang_id', '=', 'cabang.id')
            ->select(
                'transaksi.*',
                'users.name as nama_user',
                'cabang.nama_cabang'
            );

        // filter tanggal
        if ($request->dari && $request->sampai) {
            $query->whereBetween('tanggal', [$request->dari, $request->sampai]);
        }

        $laporan = $query->get();

        return view('laporan', compact('laporan'));
    }
}