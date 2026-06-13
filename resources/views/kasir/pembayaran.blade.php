@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Pembayaran</h1>

<div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">

    @foreach($items as $item)
        <div class="border p-4 mb-3 rounded bg-gray-50">
            <div><b>Produk:</b> {{ $item['produk']->nama_produk }}</div>
            <div><b>Harga:</b> Rp {{ number_format($item['produk']->harga) }}</div>
            <div><b>Jumlah:</b> {{ $item['jumlah'] }}</div>
            <div><b>Subtotal:</b> Rp {{ number_format($item['subtotal']) }}</div>
        </div>
    @endforeach

    <div class="mb-5">
        <label class="font-semibold block mb-2">Total Bayar</label>
        <div class="border rounded p-4 bg-green-100 text-green-700 text-2xl font-bold">
            Rp {{ number_format($grandTotal) }}
        </div>
    </div>

    <form action="/kasir/transaksi/store" method="POST">
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
            <label class="font-semibold block mb-2">Uang Pembeli</label>
            <input type="number" id="bayar" class="w-full border rounded p-3" required>
        </div>

        <div class="mb-5">
            <label class="font-semibold block mb-2">Kembalian</label>
            <input type="text" id="kembalian" readonly class="w-full border rounded p-3 bg-gray-100">
        </div>

        <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold">
            Simpan Transaksi
        </button>
    </form>

</div>

<script>
const total = {{ $grandTotal }};

document.getElementById('bayar').addEventListener('input', function(){

    let bayar = parseInt(this.value) || 0;
    let kembali = bayar - total;

    if(kembali >= 0){
        document.getElementById('kembalian').value =
            'Rp ' + kembali.toLocaleString('id-ID');
    }else{
        document.getElementById('kembalian').value =
            'Uang kurang Rp ' + Math.abs(kembali).toLocaleString('id-ID');
    }

});
</script>

@endsection