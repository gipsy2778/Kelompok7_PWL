@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2>Total Produk</h2>
        <p class="text-xl">{{ $totalProduk }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Total Transaksi</h2>
        <p class="text-xl">{{ $totalTransaksi }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Total User</h2>
        <p class="text-xl">{{ $totalUser }}</p>
    </div>
</div>

@endsection