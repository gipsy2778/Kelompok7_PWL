@extends('layouts.app')

@section('content')

<div class="flex flex-col h-full">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Manager
        </h1>

        <p class="text-gray-500 mt-1">
            Ringkasan aktivitas cabang yang Anda kelola
        </p>

    </div>


    <div class="grid grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">
                Total Produk
            </p>

            <h2 class="text-3xl font-bold text-gray-800">
                {{ $totalProduk }}
            </h2>

        </div>


        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">
                Stok Menipis
            </p>

            <h2 class="text-3xl font-bold text-red-500">
                {{ $stokMenipis }}
            </h2>

        </div>


        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">
                Transaksi Hari Ini
            </p>

            <h2 class="text-3xl font-bold text-gray-800">
                {{ $transaksiHariIni }}
            </h2>

        </div>


        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">
                Pendapatan Hari Ini
            </p>

            <h2 class="text-2xl font-bold text-green-600">
                Rp {{ number_format($pendapatanHariIni) }}
            </h2>

        </div>

    </div>

</div>

@endsection