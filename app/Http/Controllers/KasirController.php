<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class KasirController extends Controller
{
    public function dashboard()
    {
        return view('kasir.dashboard');
    }

    public function transaksi(Request $request)
    {
        $produk = Produk::query();

        if ($request->search) {
            $produk->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $produk = $produk->paginate(10);

        return view('kasir.transaksi', compact('produk'));
    }

    public function transaksiBaru()
    {
        $produk = Produk::all();
        return view('kasir.transaksi_baru', compact('produk'));
    }

    // 🔥 MULTI PRODUK
    public function pembayaran(Request $request)
    {
        $items = [];
        $grandTotal = 0;

        foreach ($request->jumlah as $produk_id => $qty) {

            if ($qty > 0) {
                $produk = Produk::find($produk_id);

                $subtotal = $produk->harga * $qty;
                $grandTotal += $subtotal;

                $items[] = [
                    'produk' => $produk,
                    'jumlah' => $qty,
                    'subtotal' => $subtotal
                ];
            }
        }

        return view('kasir.pembayaran', compact('items', 'grandTotal'));
    }

    // 🔥 SIMPAN MULTI DATA
   public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $total = 0;

            foreach ($request->produk_id as $index => $produkId) {

                $produk = Produk::find($produkId);

                $total += $produk->harga * $request->jumlah[$index];
            }


            // =========================
            // SIMPAN TRANSAKSI
            // =========================

            $transaksiId = DB::table('transaksi')
            ->insertGetId([

                'kode_transaksi' => 'TRX-' . date('YmdHis'),

                'tanggal' => now(),

                'total' => $total,

                'user_id' => Auth::id(),

                'cabang_id' => Auth::user()->cabang_id,

                'created_at' => now(),

                'updated_at' => now(),
            ]);


            // =========================
            // DETAIL TRANSAKSI
            // =========================

            foreach ($request->produk_id as $index => $produkId) {

                $produk = Produk::find($produkId);

                $jumlah = $request->jumlah[$index];

                $subtotal = $produk->harga * $jumlah;


                DB::table('detail_transaksi')->insert([

                    'transaksi_id' => $transaksiId,

                    'produk_id' => $produkId,

                    'jumlah' => $jumlah,

                    'harga' => $produk->harga,

                    'subtotal' => $subtotal,

                    'created_at' => now(),

                    'updated_at' => now(),
                ]);

                $stokCabang = DB::table('stok_cabang')
                ->where('produk_id', $produkId)
                ->where(
                    'cabang_id',
                    Auth::user()->cabang_id
                )
                ->first();

                if (!$stokCabang) {

                    throw new \Exception(
                        'Data stok tidak ditemukan'
                    );
                }

                if ($jumlah > $stokCabang->stok) {

                    throw new \Exception(
                        'Stok produk tidak mencukupi'
                    );
                }

                $stokSebelum = $stokCabang->stok;

                $stokSesudah = $stokCabang->stok - $jumlah;

                DB::table('stok_cabang')
                ->where('id', $stokCabang->id)
                ->update([

                    'stok' => $stokSesudah,

                    'updated_at' => now()
                ]);

                DB::table('riwayat_stok')->insert([

                    'produk_id' => $produkId,

                    'cabang_id' => Auth::user()->cabang_id,

                    'user_id' => Auth::id(),

                    'jenis' => 'penjualan',

                    'jumlah' => $jumlah,

                    'stok_sebelum' => $stokSebelum,

                    'stok_sesudah' => $stokSesudah,

                    'created_at' => now(),

                    'updated_at' => now()
                ]);
            }

            DB::commit();

            return redirect('/kasir/riwayat')
                ->with('success', 'Transaksi berhasil disimpan');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function riwayat()
    {
        $riwayat = DB::table('transaksi')
            ->where('user_id', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view(
            'kasir.riwayat',
            compact('riwayat')
        );
    }

    public function detail($id)
    {
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->join('cabang', 'transaksi.cabang_id', '=', 'cabang.id')
            ->select(
                'transaksi.*',
                'users.name as nama_user',
                'cabang.nama_cabang'
            )
            ->where('transaksi.id', $id)
            ->first();

        $detail = DB::table('detail_transaksi')
            ->join('produk', 'detail_transaksi.produk_id', '=', 'produk.id')
            ->select(
                'detail_transaksi.*',
                'produk.nama_produk'
            )
            ->where('transaksi_id', $id)
            ->get();

        return view(
            'kasir.detail',
            compact(
                'transaksi',
                'detail'
            )
        );
    }
}