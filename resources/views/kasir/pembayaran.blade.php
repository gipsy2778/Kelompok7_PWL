@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Pembayaran
</h1>

<div class="bg-white rounded-xl shadow p-6 max-w-3xl mx-auto">

    @if(count($items) == 0)

        <div class="text-center text-gray-500 py-10">

            Tidak ada produk yang dipilih

        </div>

    @else

        @foreach($items as $item)

        <div class="border p-4 mb-3 rounded bg-gray-50">

            <div class="flex justify-between">

                <div>

                    <div class="font-semibold">
                        {{ $item['produk']->nama_produk }}
                    </div>

                    <div class="text-sm text-gray-500">
                        Qty : {{ $item['jumlah'] }}
                    </div>

                </div>

                <div class="text-right">

                    <div>
                        Rp {{ number_format($item['produk']->harga,0,',','.') }}
                    </div>

                    <div class="font-semibold text-green-600">
                        Rp {{ number_format($item['subtotal'],0,',','.') }}
                    </div>

                </div>

            </div>

        </div>

        @endforeach

        <div class="border-t pt-4 mt-4">

            <div class="flex justify-between items-center">

                <span class="text-lg font-semibold">
                    Total Bayar
                </span>

                <span class="text-3xl font-bold text-green-600">
                    Rp {{ number_format($grandTotal,0,',','.') }}
                </span>

            </div>

        </div>

        <form action="/kasir/transaksi/store"
              method="POST"
              class="mt-6">

            @csrf

            @foreach($items as $item)

                <input type="hidden"
                       name="produk_id[]"
                       value="{{ $item['produk']->id }}">

                <input type="hidden"
                       name="jumlah[]"
                       value="{{ $item['jumlah'] }}">

            @endforeach

            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Uang Pembeli
                </label>

                <input type="number"
                       id="bayar"
                       min="{{ $grandTotal }}"
                       class="w-full border rounded p-3"
                       required>

            </div>

            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Kembalian
                </label>

                <input type="text"
                       id="kembalian"
                       readonly
                       class="w-full border rounded p-3 bg-gray-100">

            </div>

            <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold">

                Simpan Transaksi

            </button>

        </form>

    @endif

</div>

<script>

const total = {{ $grandTotal }};

document
    .getElementById('bayar')
    ?.addEventListener('input', function() {

    let bayar = parseInt(this.value) || 0;

    let kembali = bayar - total;

    document.getElementById('kembalian').value =
        kembali >= 0
        ? 'Rp ' + kembali.toLocaleString('id-ID')
        : 'Uang kurang Rp ' + Math.abs(kembali).toLocaleString('id-ID');

});

</script>

@endsection