@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Dashboard Kasir
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

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
            Omzet Hari Ini
        </h2>

        <p class="text-3xl font-bold mt-2 text-green-600">
            Rp {{ number_format($omzetHariIni, 0, ',', '.') }}
        </p>

    </div>

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-gray-500">
            Produk Terjual Hari Ini
        </h2>

        <p class="text-3xl font-bold mt-2">
            {{ $produkTerjual }}
        </p>

    </div>

</div>

@endsection