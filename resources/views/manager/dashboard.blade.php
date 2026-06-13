@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Dashboard Manager
</h1>

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-gray-500">
            Total Produk
        </h2>

        <p class="text-3xl font-bold mt-2">
            {{ $totalProduk }}
        </p>

    </div>

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-gray-500">
            Stok Menipis
        </h2>

        <p class="text-3xl font-bold mt-2 text-red-500">
            {{ $stokMenipis }}
        </p>

    </div>

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-gray-500">
            Transaksi Hari Ini
        </h2>

        <p class="text-3xl font-bold mt-2">
            {{ $transaksiHariIni }}
        </p>

    </div>

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-gray-500">
            Pendapatan Hari Ini
        </h2>

        <p class="text-xl font-bold mt-2 text-green-600">
            Rp {{ number_format($pendapatanHariIni) }}
        </p>

    </div>

</div>

@endsection