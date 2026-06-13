@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Monitoring Transaksi
</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">No</th>

                <th class="p-3 text-left">Kode</th>

                <th class="p-3 text-left">Tanggal</th>

                <th class="p-3 text-left">Kasir</th>

                <th class="p-3 text-left">Total</th>

            </tr>

        </thead>

        <tbody>

            @forelse($transaksi as $index => $item)

            <tr class="border-t">

                <td class="p-3">
                    {{ $transaksi->firstItem() + $index }}
                </td>

                <td class="p-3">
                    {{ $item->kode_transaksi }}
                </td>

                <td class="p-3">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                </td>

                <td class="p-3">
                    {{ $item->nama_kasir }}
                </td>

                <td class="p-3 font-semibold text-green-600">
                    Rp {{ number_format($item->total) }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5"
                    class="text-center p-5 text-gray-500">

                    Belum ada transaksi

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-4">
    {{ $transaksi->links() }}
</div>

@endsection