@extends('layouts.app')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard Supervisor
    </h1>

    <p class="text-gray-500 mt-1">
        Ringkasan aktivitas cabang Anda
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Transaksi
        </p>

        <h2 class="text-3xl font-bold mt-2">
            {{ number_format($jumlahTransaksi) }}
        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Kasir
        </p>

        <h2 class="text-3xl font-bold mt-2 text-blue-600">
            {{ number_format($kasirAktif) }}
        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Omzet
        </p>

        <h2 class="text-3xl font-bold mt-2 text-green-600">
            Rp {{ number_format($omzet,0,',','.') }}
        </h2>

    </div>

</div>

@endsection