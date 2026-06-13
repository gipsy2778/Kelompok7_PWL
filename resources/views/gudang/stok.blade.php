@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Monitoring Stok
</h1>

<table class="min-w-full bg-white rounded shadow">

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

        @forelse($stok as $index => $item)

        <tr class="border-t">

            <td class="p-3">
                {{ $index + 1 }}
            </td>

            <td class="p-3">
                {{ $item->nama_produk }}
            </td>

            <td class="p-3">
                {{ $item->nama_cabang }}
            </td>

            <td class="p-3 font-semibold">
                {{ $item->stok }}
            </td>

            <td class="p-3">

                @if($item->stok <= 10)

                    <span class="text-red-500 font-semibold">
                        Menipis
                    </span>

                @elseif($item->stok <= 25)

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
                class="text-center p-5 text-gray-500">

                Tidak ada data stok

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection