@extends('layouts.app')

@section('content')

<div class="flex flex-col h-full">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Monitoring Transaksi Cabang
        </h1>

        <p class="text-gray-500 mt-1">
            Daftar transaksi cabang yang Anda kelola
        </p>

    </div>


    <div class="bg-white rounded-xl shadow overflow-hidden flex flex-col flex-1">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">
                        No
                    </th>

                    <th class="p-3 text-left">
                        Kode Transaksi
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

                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3">

                        {{ ($transaksi->currentPage() - 1)
                            * $transaksi->perPage()
                            + $index + 1 }}

                    </td>

                    <td class="p-3 font-medium">
                        {{ $t->kode_transaksi }}
                    </td>

                    <td class="p-3">
                        {{ $t->tanggal }}
                    </td>

                    <td class="p-3">
                        {{ $t->nama_kasir }}
                    </td>

                    <td class="p-3 text-right font-semibold text-green-600">
                        Rp {{ number_format($t->total) }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center p-6 text-gray-500">

                        Belum ada transaksi

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-4 flex justify-end">

        {{ $transaksi->onEachSide(1)->links() }}

    </div>

</div>

@endsection