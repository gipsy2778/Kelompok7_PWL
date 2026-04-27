<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'cabang_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'kasir',
                'cabang_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}