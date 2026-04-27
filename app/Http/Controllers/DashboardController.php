<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = DB::table('produk')->count();
        $totalTransaksi = DB::table('transaksi')->count();
        $totalUser = DB::table('users')->count();

        return view('dashboard', compact(
            'totalProduk',
            'totalTransaksi',
            'totalUser'
        ));
    }
}