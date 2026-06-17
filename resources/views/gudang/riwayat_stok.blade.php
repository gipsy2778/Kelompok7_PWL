@extends('layouts.app')

@section('content')

<div class="flex flex-col h-full">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Riwayat Pergerakan Stok
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Riwayat barang masuk dan keluar gudang
        </p>

    </div>


    {{-- TABLE --}}
    <div class="flex flex-col flex-1">

        <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="p-3 text-left font-semibold">
                            No
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Tanggal
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Produk
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Jenis
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Jumlah
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Stok Sebelum
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Stok Sesudah
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Petugas
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($riwayat as $index => $r)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-3">

                            {{ ($riwayat->currentPage() - 1) * $riwayat->perPage() + $index + 1 }}

                        </td>

                        <td class="p-3">

                            {{ \Carbon\Carbon::parse($r->created_at)->format('d-m-Y H:i') }}

                        </td>

                        <td class="p-3">

                            {{ $r->nama_produk }}

                        </td>

                        <td class="p-3">

                            @if($r->jenis == 'masuk')

                                <span class="text-green-600 font-semibold">
                                    Masuk
                                </span>

                            @elseif($r->jenis == 'keluar')

                                <span class="text-red-600 font-semibold">
                                    Keluar
                                </span>

                            @else

                                <span class="text-blue-600 font-semibold">
                                    Penjualan
                                </span>

                            @endif

                        </td>

                        <td class="p-3 font-semibold">

                            {{ $r->jumlah }}

                        </td>

                        <td class="p-3">

                            {{ $r->stok_sebelum }}

                        </td>

                        <td class="p-3">

                            {{ $r->stok_sesudah }}

                        </td>

                        <td class="p-3">

                            {{ $r->name }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8"
                            class="p-6 text-center text-gray-500">

                            Belum ada riwayat stok

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        <div class="mt-auto pt-4 flex justify-end">

            {{ $riwayat->onEachSide(1)->links() }}

        </div>

    </div>

</div>

@endsection