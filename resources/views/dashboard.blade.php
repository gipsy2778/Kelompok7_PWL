@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white p-5 shadow rounded">
        <h2 class="text-gray-500">Total Produk</h2>
        <p class="text-3xl font-bold">120</p>
    </div>

    <div class="bg-white p-5 shadow rounded">
        <h2 class="text-gray-500">Total Transaksi</h2>
        <p class="text-3xl font-bold">350</p>
    </div>

    <div class="bg-white p-5 shadow rounded">
        <h2 class="text-gray-500">Total Cabang</h2>
        <p class="text-3xl font-bold">5</p>
    </div>

</div>

@endsection