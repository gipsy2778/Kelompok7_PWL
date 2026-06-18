@extends('layouts.app')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold text-gray-800">
        Laporan Transaksi
    </h1>

    <p class="text-gray-500 mt-1">
        Rekap transaksi harian cabang Anda
    </p>

</div>

<div class="grid grid-cols-2 gap-6 mb-6">

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Hari Tercatat
        </p>

        <h2 class="text-3xl font-bold mt-2">
            {{ $laporan->count() }}
        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Omzet
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            Rp {{ number_format($laporan->sum('omzet'),0,',','.') }}
        </h2>

    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">
                    Tanggal
                </th>

                <th class="p-3 text-left">
                    Jumlah Transaksi
                </th>

                <th class="p-3 text-left">
                    Omzet
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($laporan as $item)

            <tr class="border-t hover:bg-gray-50">

                <td class="p-3">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                </td>

                <td class="p-3">
                    {{ $item->jumlah_transaksi }}
                </td>

                <td class="p-3 font-semibold text-green-600">
                    Rp {{ number_format($item->omzet,0,',','.') }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3"
                    class="text-center p-5 text-gray-500">

                    Belum ada laporan

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection