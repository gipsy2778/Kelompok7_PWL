@php
    $role = auth()->user()->role;
@endphp

<div class="w-64 bg-gray-900 text-gray-200 flex flex-col fixed h-screen">

    {{-- LOGO --}}
    <div class="p-6 text-2xl font-bold border-b border-gray-700">
        MiniMarket
    </div>

    {{-- MENU --}}
    <div class="flex-1 p-4 space-y-2 overflow-y-auto">

        {{-- ADMIN --}}
        @if($role == 'admin')

            <a href="/dashboard"
               class="block px-4 py-2 rounded-lg {{ request()->is('dashboard') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Dashboard
            </a>

            <a href="/produk"
               class="block px-4 py-2 rounded-lg {{ request()->is('produk*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Produk
            </a>

            <a href="/transaksi"
               class="block px-4 py-2 rounded-lg {{ request()->is('transaksi*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Transaksi
            </a>

            <a href="/laporan"
               class="block px-4 py-2 rounded-lg {{ request()->is('laporan*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Laporan
            </a>

        @endif

        {{-- MANAGER --}}
        @if($role == 'manager')

            <a href="/manager"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('manager') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Dashboard
            </a>

            <a href="/manager/transaksi"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('manager/transaksi*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Monitoring Transaksi
            </a>

            <a href="/manager/stok"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('manager/stok*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Monitoring Stok
            </a>

            <a href="/manager/laporan"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('manager/laporan*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Laporan Cabang
            </a>

        @endif

        {{-- SUPERVISOR --}}
        @if($role == 'supervisor')

            <a href="/supervisor"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('supervisor') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white transition' }}">

                Dashboard

            </a>

            <a href="/supervisor/monitoring-transaksi"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('supervisor/monitoring-transaksi') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white transition' }}">

                Monitoring Transaksi

            </a>

            <a href="/supervisor/kasir"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('supervisor/kasir') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white transition' }}">

                Data Kasir

            </a>

            <a href="/supervisor/laporan-transaksi"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('supervisor/laporan-transaksi') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white transition' }}">

                Laporan Transaksi

            </a>

        @endif

        {{-- KASIR --}}
        @if($role == 'kasir')

           <a href="/kasir"
            class="block px-4 py-2 rounded-lg {{ request()->is('kasir') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Dashboard
            </a>

            <a href="/kasir/transaksi"
            class="block px-4 py-2 rounded-lg {{ request()->is('kasir/transaksi*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Transaksi
            </a>

            <a href="/kasir/riwayat"
            class="block px-4 py-2 rounded-lg {{ request()->is('kasir/riwayat*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Riwayat Transaksi
            </a>


        @endif

        {{-- GUDANG --}}
        @if($role == 'gudang')

            <a href="/gudang"
               class="block px-4 py-2 rounded-lg {{ request()->is('gudang') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Dashboard
            </a>

            <a href="/gudang/stok"
               class="block px-4 py-2 rounded-lg {{ request()->is('gudang/stok*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Stok Barang
            </a>

            <a href="/gudang/barang-masuk"
               class="block px-4 py-2 rounded-lg {{ request()->is('gudang/barang-masuk*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Barang Masuk
            </a>

            <a href="/gudang/barang-keluar"
               class="block px-4 py-2 rounded-lg {{ request()->is('gudang/barang-keluar*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
                Barang Keluar
            </a>

            <a href="/gudang/riwayat-stok"
            class="block px-4 py-2 rounded-lg
            {{ request()->is('gudang/riwayat-stok*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white transition' }}">

                Riwayat Stok

            </a>



        @endif

    </div>

    {{-- FOOTER --}}
    <div class="p-4 text-sm border-t border-gray-700 text-center">
        © 2026
    </div>

</div>