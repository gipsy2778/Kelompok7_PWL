@extends('layouts.app')

@section('content')

<div class="flex flex-col h-full">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Monitoring Stok Cabang
        </h1>

        <p class="text-gray-500 mt-1">
            Daftar stok produk pada cabang yang Anda kelola
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
                        Produk
                    </th>

                    <th class="p-3 text-left">
                        Cabang
                    </th>

                    <th class="p-3 text-left">
                        Stok
                    </th>

                    <th class="p-3 text-left">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($produk as $index => $s)

                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3">
                        {{ $index + 1 }}
                    </td>

                    <td class="p-3">
                        {{ $s->nama_produk }}
                    </td>

                    <td class="p-3">
                        {{ $s->nama_cabang }}
                    </td>

                    <td class="p-3 font-semibold">
                        {{ $s->stok }}
                    </td>

                    <td class="p-3">

                        @if($s->stok <= 10)

                            <span class="text-red-500 font-semibold">
                                Menipis
                            </span>

                        @elseif($s->stok <= 25)

                            <span class="text-yellow-500 font-semibold">
                                Perhatian
                            </span>

                        @else

                            <span class="text-green-500 font-semibold">
                                Aman
                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center p-6 text-gray-500">

                        Tidak ada data stok

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection