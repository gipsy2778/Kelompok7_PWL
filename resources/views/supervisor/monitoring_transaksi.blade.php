@extends('layouts.app')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold text-gray-800">
        Monitoring Transaksi
    </h1>

    <p class="text-gray-500 mt-1">
        Daftar transaksi pada cabang Anda
    </p>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

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

                <th class="p-3 text-left">
                    Total
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($transaksi as $index => $item)

            <tr class="border-t hover:bg-gray-50">

                <td class="p-3">
                    {{ $transaksi->firstItem() + $index }}
                </td>

                <td class="p-3 font-medium">
                    {{ $item->kode_transaksi }}
                </td>

                <td class="p-3">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                </td>

                <td class="p-3">
                    {{ $item->nama_kasir }}
                </td>

                <td class="p-3 font-semibold text-green-600">
                    Rp {{ number_format($item->total,0,',','.') }}
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

<div class="mt-4">
    {{ $transaksi->links() }}
</div>

@endsection