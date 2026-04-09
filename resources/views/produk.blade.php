@extends('layouts.app') {{-- Sesuaikan dengan nama file layout utama kamu --}}

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Produk</h1>
            <p class="text-sm text-gray-500">Kelola stok dan informasi barang MiniMarket Anda.</p>
        </div>
        <button class="bg-gray-900 hover:bg-gray-800 text-white px-5 py-2.5 rounded-lg flex items-center transition shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Produk
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">Info Produk</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">Stok</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 bg-gray-100 rounded-md flex items-center justify-center text-gray-500 font-bold">
                                    M
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Minyak Goreng 2L</div>
                                    <div class="text-xs text-gray-400">ID: PRD-001</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-semibold">Sembako</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-center text-gray-600">
                            <div class="font-semibold">45</div>
                            <div class="text-[10px] text-green-500 font-bold uppercase">Tersedia</div>
                        </td>
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">
                            Rp 34.500
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <button class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-md transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-md transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center text-xs text-gray-500">
            Menampilkan 1 sampai 10 dari 50 produk
            <div class="flex space-x-1">
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-white transition">Prev</button>
                <button class="px-3 py-1 border border-gray-300 rounded hover:bg-white transition">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection