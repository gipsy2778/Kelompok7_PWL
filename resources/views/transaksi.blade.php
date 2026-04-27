@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Data Transaksi</h1>

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
        @foreach($transaksi as $t)
        <tr class="border-t">
            <td class="p-2">{{ $t->tanggal }}</td>
            <td class="p-2">{{ $t->nama_user }}</td>
            <td class="p-2">{{ $t->nama_cabang }}</td>
            <td class="p-2">Rp {{ $t->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection