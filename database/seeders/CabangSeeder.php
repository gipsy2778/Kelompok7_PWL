<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cabang')->insert([
            [
                'nama_cabang' => 'Cabang Jakarta',
                'alamat' => 'Jl. Sudirman'
            ],
            [
                'nama_cabang' => 'Cabang Bandung',
                'alamat' => 'Jl. Asia Afrika'
            ]
        ]);
    }
}
