@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Dashboard Supervisor
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="bg-white p-5 rounded-xl shadow">

        <p class="text-gray-500 text-sm">
            Total Transaksi
        </p>

        <h2 class="text-3xl font-bold mt-2">
            {{ $jumlahTransaksi }}
        </h2>

    </div>

    <div class="bg-white p-5 rounded-xl shadow">

        <p class="text-gray-500 text-sm">
            Total Kasir
        </p>

        <h2 class="text-3xl font-bold mt-2">
            {{ $kasirAktif }}
        </h2>

    </div>

    <div class="bg-white p-5 rounded-xl shadow">

        <p class="text-gray-500 text-sm">
            Total Omzet
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            Rp {{ number_format($omzet,0,',','.') }}
        </h2>

    </div>

</div>

@endsection