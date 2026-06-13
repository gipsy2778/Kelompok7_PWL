@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Laporan Transaksi
</h1>

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

            <tr class="border-t">

                <td class="p-3">
                    {{ $item->tanggal }}
                </td>

                <td class="p-3">
                    {{ $item->jumlah_transaksi }}
                </td>

                <td class="p-3 font-semibold text-green-600">
                    Rp {{ number_format($item->omzet) }}
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