@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Transaksi Baru
</h1>

@if(session('error'))
<div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<div class="bg-white rounded-xl shadow p-6">

    <div class="mb-5">
        <input type="text"
               id="search"
               placeholder="Cari Produk..."
               class="w-full border rounded-lg p-3">
    </div>

    <form action="{{ url('/kasir/pembayaran') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @forelse($produk as $p)

            <div class="border rounded-xl p-4 shadow-sm produk-card">

                <h3 class="font-bold text-lg">
                    {{ $p->nama_produk }}
                </h3>

                <p class="mt-2 text-gray-600">
                    Harga :
                    Rp {{ number_format($p->harga,0,',','.') }}
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    Stok :
                    {{ $p->stok }}
                </p>

                @if($p->stok <= 10)

                    <p class="text-red-500 text-sm font-semibold mt-1">
                        Stok Menipis
                    </p>

                @endif

                <div class="mt-4">

                    <input
                        type="number"
                        name="jumlah[{{ $p->id }}]"
                        min="0"
                        max="{{ $p->stok }}"
                        placeholder="Jumlah"
                        class="w-full border rounded p-2">

                </div>

            </div>

            @empty

            <div class="col-span-3 text-center text-gray-500 py-10">
                Tidak ada produk tersedia
            </div>

            @endforelse

        </div>

        <div class="mt-6 flex justify-end">

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg">

                Lanjut Pembayaran

            </button>

        </div>

    </form>

</div>

<script>

document.getElementById('search')
.addEventListener('keyup', function() {

    let keyword = this.value.toLowerCase();

    document.querySelectorAll('.produk-card')
    .forEach(card => {

        let nama = card.querySelector('h3')
        .innerText.toLowerCase();

        card.style.display =
            nama.includes(keyword)
            ? ''
            : 'none';

    });

});

</script>

@endsection