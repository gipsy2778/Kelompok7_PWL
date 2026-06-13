@extends('layouts.app')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold text-gray-800">
        Monitoring Transaksi Cabang
    </h1>

    <p class="text-gray-500 mt-1">
        Monitoring seluruh transaksi cabang secara realtime
    </p>

</div>


{{-- CARD --}}
<div class="bg-white rounded-2xl shadow-md overflow-hidden">

    {{-- HEADER --}}
    <div class="p-5 border-b bg-gray-50">

        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-lg text-gray-700">
                Data Transaksi
            </h2>

            <form>

                <input
                    type="text"
                    placeholder="Cari transaksi..."
                    class="border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">

            </form>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-800 text-white">

                <tr>

                    <th class="px-6 py-4 text-left">
                        No
                    </th>

                    <th class="px-6 py-4 text-left">
                        Kode Transaksi
                    </th>

                    <th class="px-6 py-4 text-left">
                        Tanggal
                    </th>

                    <th class="px-6 py-4 text-left">
                        Kasir
                    </th>

                    <th class="px-6 py-4 text-right">
                        Total
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($transaksi as $i => $t)

                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="px-6 py-4">
                        {{ $i + 1 }}
                    </td>

                    <td class="px-6 py-4 font-medium">
                        {{ $t->kode_transaksi }}
                    </td>

                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($t->tanggal)->format('d M Y') }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $t->nama_kasir }}
                    </td>

                    <td class="px-6 py-4 text-right font-semibold text-green-600">
                        Rp {{ number_format($t->total,0,',','.') }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center py-10 text-gray-500">

                        Belum ada transaksi

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection