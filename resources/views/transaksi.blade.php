@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Input Transaksi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cari Produk / Barcode</label>
                    <input type="text" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-gray-900 focus:border-gray-900" placeholder="Ketik nama atau scan...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                    <input type="number" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-gray-900 focus:border-gray-900" value="1">
                </div>
            </div>
            <button class="mt-4 w-full bg-gray-900 text-white py-2 rounded-lg hover:bg-gray-800 transition font-semibold">
                + Tambah ke Keranjang
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase">Produk</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase text-center">Qty</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase">Subtotal</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Minyak Goreng 2L</div>
                            <div class="text-xs text-gray-400">Rp 34.500</div>
                        </td>
                        <td class="px-6 py-4 text-center text-sm">2</td>
                        <td class="px-6 py-4 text-sm font-bold">Rp 69.000</td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-red-500 hover:text-red-700 font-bold">×</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="lg:col-span-1">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 sticky top-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Total Belanja</h2>
            
            <div class="space-y-3 mb-6">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal</span>
                    <span>Rp 69.000</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Pajak (11%)</span>
                    <span>Rp 7.590</span>
                </div>
                <hr class="border-dashed border-gray-200">
                <div class="flex justify-between text-xl font-black text-gray-900">
                    <span>TOTAL</span>
                    <span>Rp 76.590</span>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nominal Uang</label>
                    <input type="text" class="w-full p-3 text-lg font-bold border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500" placeholder="Rp 0">
                </div>
                <button class="w-full bg-green-600 text-white py-4 rounded-xl hover:bg-green-700 transition font-bold text-lg shadow-lg shadow-green-200">
                    PROSES BAYAR
                </button>
            </div>
        </div>
    </div>

</div>
@endsection