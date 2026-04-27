<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Indomie',
                'harga' => 3000,
                'stok' => 100,
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Aqua',
                'harga' => 5000,
                'stok' => 50,
                'kategori_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}