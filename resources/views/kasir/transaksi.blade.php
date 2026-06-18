@extends('layouts.app')

@section('content')

@if(session('success'))

<style>
@keyframes pop {
    0% {
        transform: scale(0.3);
        opacity: 0;
    }
    70% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
</style>

<div id="notif"
     class="fixed inset-0 flex items-center justify-center bg-black/40 z-50">

    <div class="bg-white rounded-2xl shadow-2xl p-8 text-center">

        <div style="animation: pop .4s ease-out;"
             class="w-20 h-20 mx-auto bg-green-500 rounded-full flex items-center justify-center text-white text-4xl mb-4">
            ✓
        </div>

        <h2 class="text-xl font-bold text-gray-800">
            Berhasil!
        </h2>

        <p class="text-gray-500 mt-2">
            {{ session('success') }}
        </p>

    </div>

</div>

<script>
setTimeout(() => {
    document.getElementById('notif').remove();
}, 2500);
</script>

@endif

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-2xl font-bold">
            Transaksi Penjualan
        </h1>

        <p class="text-gray-500">
            Daftar produk yang tersedia di cabang Anda
        </p>

    </div>

    <a href="/kasir/transaksi-baru"
       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">

        Transaksi Baru

    </a>

</div>

<div class="bg-white rounded-xl shadow p-4 mb-4">

    <form method="GET">

        <div class="flex gap-2">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari produk..."
                   class="border rounded px-3 py-2 w-full">

            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

                Cari

            </button>

        </div>

    </form>

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
                    Harga
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

            @forelse($produk as $index => $p)

            <tr class="border-t">

                <td class="p-3">
                    {{ $produk->firstItem() + $index }}
                </td>

                <td class="p-3">
                    {{ $p->nama_produk }}
                </td>

                <td class="p-3">
                    Rp {{ number_format($p->harga,0,',','.') }}
                </td>

                <td class="p-3 font-semibold">
                    {{ $p->stok }}
                </td>

                <td class="p-3">

                    @if($p->stok <= 0)

                        <span class="text-red-500 font-semibold">
                            Habis
                        </span>

                    @elseif($p->stok <= 10)

                        <span class="text-yellow-500 font-semibold">
                            Menipis
                        </span>

                    @else

                        <span class="text-green-500 font-semibold">
                            Tersedia
                        </span>

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5"
                    class="text-center p-5 text-gray-500">

                    Produk tidak ditemukan

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-4">

    {{ $produk->links() }}

</div>

@endsection