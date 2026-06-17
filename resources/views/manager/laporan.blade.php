@extends('layouts.app')

@section('content')

<div class="flex flex-col h-full">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Laporan Cabang
        </h1>

        <p class="text-gray-500 mt-1">
            Ringkasan transaksi cabang yang Anda kelola
        </p>

    </div>


    <div class="grid grid-cols-2 gap-6 mb-6">

        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">
                Total Pendapatan
            </p>

            <h2 class="text-3xl font-bold text-green-600">

                Rp {{ number_format($totalPendapatan) }}

            </h2>

        </div>


        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500 text-sm mb-2">
                Total Transaksi
            </p>

            <h2 class="text-3xl font-bold">

                {{ $totalTransaksi }}

            </h2>

        </div>

    </div>


    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">
                        No
                    </th>

                    <th class="p-3 text-left">
                        Kode
                    </th>

                    <th class="p-3 text-left">
                        Tanggal
                    </th>

                    <th class="p-3 text-left">
                        Kasir
                    </th>

                    <th class="p-3 text-right">
                        Total
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($transaksi as $index => $t)

                <tr class="border-t">

                    <td class="p-3">

                        {{ $index + 1 }}

                    </td>

                    <td class="p-3">

                        {{ $t->kode_transaksi }}

                    </td>

                    <td class="p-3">

                        {{ $t->tanggal }}

                    </td>

                    <td class="p-3">

                        {{ $t->nama_kasir }}

                    </td>

                    <td class="p-3 text-right font-semibold">

                        Rp {{ number_format($t->total) }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center p-6 text-gray-500">

                        Tidak ada data transaksi

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-6">

        <a href="/manager/laporan/pdf"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

            Cetak PDF

        </a>

    </div>

</div>

@endsection