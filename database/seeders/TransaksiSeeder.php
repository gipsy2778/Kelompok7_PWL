<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        // insert transaksi
        DB::table('transaksi')->insert([
            [
                'tanggal' => now(),
                'total' => 8000,
                'user_id' => 1,
                'cabang_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // insert detail transaksi
        DB::table('detail_transaksi')->insert([
            [
                'transaksi_id' => 1,
                'produk_id' => 1,
                'jumlah' => 1,
                'harga' => 3000,
                'subtotal' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaksi_id' => 1,
                'produk_id' => 2,
                'jumlah' => 1,
                'harga' => 5000,
                'subtotal' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}