@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Laporan Transaksi</h1>

<form method="GET" class="mb-4 flex gap-2">
    <input type="date" name="dari" class="border p-2">
    <input type="date" name="sampai" class="border p-2">
    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Filter
    </button>
</form>

<table class="min-w-full bg-white rounded shadow">
    <thead>
        <tr>
            <th class="p-2">Tanggal</th>
            <th class="p-2">User</th>
            <th class="p-2">Cabang</th>
            <th class="p-2">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporan as $l)
        <tr class="border-t">
            <td class="p-2">{{ $l->tanggal }}</td>
            <td class="p-2">{{ $l->nama_user }}</td>
            <td class="p-2">{{ $l->nama_cabang }}</td>
            <td class="p-2">Rp {{ $l->total }}</td>
        </tr>
        @endforeach
    </tbody>
    <button onclick="window.print()" class="bg-green-500 text-white px-4 py-2 rounded">
        Print
    </button>
</table>

@endsection