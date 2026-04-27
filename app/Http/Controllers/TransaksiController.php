<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->join('cabang', 'transaksi.cabang_id', '=', 'cabang.id')
            ->select(
                'transaksi.*',
                'users.name as nama_user',
                'cabang.nama_cabang'
            )
            ->get();

        return view('transaksi', compact('transaksi'));
    }
}