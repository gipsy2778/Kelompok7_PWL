@extends('layouts.app')

@section('content')

<div class="max-w-3xl">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Input Barang Masuk
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Tambahkan stok barang ke gudang
        </p>

    </div>


    {{-- ALERT --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">

            {{ session('error') }}

        </div>

    @endif


    {{-- FORM --}}
    <form action="/gudang/barang-masuk"
          method="POST"
          class="bg-white p-6 rounded-xl shadow border border-gray-100">

        @csrf

        <div class="mb-4">

            <label class="block mb-2 text-sm font-medium text-gray-700">
                Produk
            </label>

            <select name="produk_id"
                    required
                    class="w-full border rounded-lg p-2">

                <option value="">
                    Pilih Produk
                </option>

                @foreach($produk as $p)

                    <option value="{{ $p->id }}">
                        {{ $p->nama_produk }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="mb-4">

            <label class="block mb-2 text-sm font-medium text-gray-700">
                Jumlah Barang Masuk
            </label>

            <input type="number"
                   name="jumlah"
                   min="1"
                   required
                   class="w-full border rounded-lg p-2">

        </div>


        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-700">
                Keterangan
            </label>

            <textarea
                rows="3"
                class="w-full border rounded-lg p-2"
                placeholder="Opsional"></textarea>

        </div>


        <div class="flex gap-2">

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                Simpan

            </button>

            <a href="/gudang"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection