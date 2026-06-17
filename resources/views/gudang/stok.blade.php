@extends('layouts.app')

@section('content')

<div class="flex flex-col h-full">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Monitoring Stok
        </h1>

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
                            Produk
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Cabang
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Stok
                        </th>

                        <th class="p-3 text-left font-semibold">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($stok as $index => $item)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-3">

                            {{
                                ($stok->currentPage() - 1)
                                * $stok->perPage()
                                + $index + 1
                            }}

                        </td>

                        <td class="p-3 font-medium">

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

                                <span class="px-2 py-1 bg-red-100 text-red-600 rounded text-xs font-semibold">
                                    Menipis
                                </span>

                            @elseif($item->stok <= 25)

                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-semibold">
                                    Perhatian
                                </span>

                            @else

                                <span class="px-2 py-1 bg-green-100 text-green-600 rounded text-xs font-semibold">
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


        {{-- PAGINATION --}}
        <div class="mt-auto pt-4 flex justify-end">

            {{ $stok->onEachSide(1)->links() }}

        </div>

    </div>

</div>

@endsection