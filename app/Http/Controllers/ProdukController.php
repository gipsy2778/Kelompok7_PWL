<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
            ->select('produk.*', 'kategori.nama_kategori')
            ->get();

        return view('produk', compact('produk'));
    }
}