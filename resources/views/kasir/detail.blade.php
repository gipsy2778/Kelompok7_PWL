@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Detail Transaksi
</h1>

<div class="bg-white rounded-xl shadow p-6 mb-6">

    <div class="grid grid-cols-2 gap-4">

        <div>
            <p class="text-gray-500">Kode Transaksi</p>
            <p class="font-semibold">
                {{ $transaksi->kode_transaksi }}
            </p>
        </div>

        <div>
            <p class="text-gray-500">Tanggal</p>
            <p class="font-semibold">
                {{ $transaksi->tanggal }}
            </p>
        </div>

        <div>
            <p class="text-gray-500">Kasir</p>
            <p class="font-semibold">
                {{ $transaksi->nama_user }}
            </p>
        </div>

        <div>
            <p class="text-gray-500">Cabang</p>
            <p class="font-semibold">
                {{ $transaksi->nama_cabang }}
            </p>
        </div>

    </div>

    <div class="mt-4 border-t pt-4">

        <p class="text-gray-500">
            Total Transaksi
        </p>

        <p class="text-2xl font-bold text-green-600">
            Rp {{ number_format($transaksi->total) }}
        </p>

    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">No</th>

                <th class="p-3 text-left">Produk</th>

                <th class="p-3 text-left">Jumlah</th>

                <th class="p-3 text-left">Harga</th>

                <th class="p-3 text-left">Subtotal</th>

            </tr>

        </thead>

        <tbody>

            @foreach($detail as $index => $item)

            <tr class="border-t">

                <td class="p-3">
                    {{ $index + 1 }}
                </td>

                <td class="p-3">
                    {{ $item->nama_produk }}
                </td>

                <td class="p-3">
                    {{ $item->jumlah }}
                </td>

                <td class="p-3">
                    Rp {{ number_format($item->harga) }}
                </td>

                <td class="p-3 font-semibold">
                    Rp {{ number_format($item->subtotal) }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<div class="mt-4">

    <a href="/kasir/riwayat"
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">

        Kembali

    </a>

</div>

@endsection