<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CabangSeeder::class,
            KategoriSeeder::class,
            UserSeeder::class,
            ProdukSeeder::class,
            TransaksiSeeder::class,
        ]);
    }
}