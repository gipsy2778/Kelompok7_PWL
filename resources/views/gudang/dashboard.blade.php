@extends('layouts.app')

@section('content')

<div>

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Gudang
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Ringkasan kondisi stok gudang
        </p>

    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

        {{-- TOTAL PRODUK --}}
        <div class="bg-white p-5 rounded-xl shadow border border-gray-100">

            <p class="text-gray-500 text-sm">
                Total Produk
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ number_format($totalProduk) }}
            </h2>

        </div>


        {{-- TOTAL STOK --}}
        <div class="bg-white p-5 rounded-xl shadow border border-gray-100">

            <p class="text-gray-500 text-sm">
                Total Stok
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ number_format($totalStok) }}
            </h2>

        </div>


        {{-- STOK MENIPIS --}}
        <div class="bg-white p-5 rounded-xl shadow border border-gray-100">

            <p class="text-gray-500 text-sm">
                Stok Menipis
            </p>

            <h2 class="text-3xl font-bold text-red-500 mt-2">
                {{ number_format($stokMenipis) }}
            </h2>

        </div>


        {{-- BARANG MASUK HARI INI --}}
        <div class="bg-white p-5 rounded-xl shadow border border-gray-100">

            <p class="text-gray-500 text-sm">
                Barang Masuk Hari Ini
            </p>

            <h2 class="text-3xl font-bold text-green-500 mt-2">
                {{ number_format($barangMasukHariIni) }}
            </h2>

        </div>

    </div>


    {{-- INFO --}}
    <div class="bg-white mt-6 p-5 rounded-xl shadow border border-gray-100">

        <h3 class="font-semibold text-gray-800 mb-2">
            Informasi Gudang
        </h3>

    </div>

</div>

@endsection