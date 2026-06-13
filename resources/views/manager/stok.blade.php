@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Monitoring Stok Cabang
</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-3 text-left">No</th>
                <th class="p-3 text-left">Produk</th>
                <th class="p-3 text-left">Cabang</th>
                <th class="p-3 text-left">Stok</th>
                <th class="p-3 text-left">Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse($produk as $i => $s)

            <tr class="border-t">

                <td class="p-3">
                    {{ $i + 1 }}
                </td>

                <td class="p-3">
                    {{ $s->nama_produk }}
                </td>

                <td class="p-3">
                    {{ $s->nama_cabang }}
                </td>

                <td class="p-3">
                    {{ $s->stok }}
                </td>

                <td class="p-3">

                    @if($s->stok <= 10)

                        <span class="text-red-500 font-semibold">
                            Menipis
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
                    class="p-4 text-center text-gray-500">

                    Data stok kosong

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection