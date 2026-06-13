<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_stok', function (Blueprint $table) {

            $table->id();

            $table->foreignId('produk_id')
                ->constrained('produk')
                ->cascadeOnDelete();

            $table->foreignId('cabang_id')
                ->constrained('cabang')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->enum('jenis', [
                'masuk',
                'keluar',
                'penjualan'
            ]);

            $table->integer('jumlah');

            $table->integer('stok_sebelum');

            $table->integer('stok_sesudah');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_stok');
    }
};