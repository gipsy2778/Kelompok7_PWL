@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Data Produk</h1>

<table class="min-w-full bg-white rounded shadow">
    <thead>
        <tr>
            <th class="p-2">Nama</th>
            <th class="p-2">Kategori</th>
            <th class="p-2">Harga</th>
            <th class="p-2">Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $p)
        <tr class="border-t">
            <td class="p-2">{{ $p->nama_produk }}</td>
            <td class="p-2">{{ $p->nama_kategori }}</td>
            <td class="p-2">Rp {{ $p->harga }}</td>
            <td class="p-2">{{ $p->stok }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection