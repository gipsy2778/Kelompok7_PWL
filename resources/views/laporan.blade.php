@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Laporan Penjualan</h1>
            <p class="text-sm text-gray-500">Pantau statistik dan pendapatan MiniMarket Anda.</p>
        </div>
        <div class="flex items-center space-x-3">
            <input type="date" class="p-2 border border-gray-300 rounded-lg text-sm focus:ring-gray-900 focus:border-gray-900">
            <button class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-800 transition">
                Ekspor PDF
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-sm font-medium text-gray-500 uppercase">Total Pendapatan</p>
            <p class="text-2xl font-bold text-gray-900 mt-1">Rp 12.450.000</p>
            <p class="text-xs text-green-500 mt-2 font-semibold">↑ 12% dari bulan lalu</p>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-sm font-medium text-gray-500 uppercase">Transaksi Berhasil</p>
            <p class="text-2xl font-bold text-gray-900 mt-1">152</p>
            <p class="text-xs text-gray-400 mt-2 italic">Hari ini: 14 Transaksi</p>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <p class="text-sm font-medium text-gray-500 uppercase">Produk Terlaris</p>
            <p class="text-2xl font-bold text-gray-900 mt-1">Minyak Goreng</p>
            <p class="text-xs text-blue-500 mt-2 font-semibold">Terjual 84 Pcs</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Tren Penjualan 7 Hari Terakhir</h3>
        <div class="w-full h-48 bg-gray-50 rounded-lg border-2 border-dashed border-gray-200 flex items-center justify-center">
            <span class="text-gray-400 italic text-sm">Bagian ini biasanya diisi grafik Chart.js</span>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-200 bg-gray-50">
            <h3 class="font-bold text-gray-700">Detail Transaksi Terbaru</h3>
        </div>
        <table class="w-full text-left text-sm">
            <thead class="bg-white border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-600">ID Transaksi</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Tanggal</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Metode</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Total Tagihan</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-blue-600">#TRX-9921</td>
                    <td class="px-6 py-4 text-gray-600">09 Apr 2026</td>
                    <td class="px-6 py-4">Cash</td>
                    <td class="px-6 py-4 font-bold text-gray-900">Rp 76.590</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Selesai</span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-blue-600">#TRX-9920</td>
                    <td class="px-6 py-4 text-gray-600">09 Apr 2026</td>
                    <td class="px-6 py-4">QRIS</td>
                    <td class="px-6 py-4 font-bold text-gray-900">Rp 120.000</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Selesai</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection