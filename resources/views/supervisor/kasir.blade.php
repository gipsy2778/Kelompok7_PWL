@extends('layouts.app')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold text-gray-800">
        Data Kasir Cabang
    </h1>

    <p class="text-gray-500 mt-1">
        Daftar kasir yang terdaftar pada cabang Anda
    </p>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">
                    No
                </th>

                <th class="p-3 text-left">
                    Nama
                </th>

                <th class="p-3 text-left">
                    Email
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($kasir as $index => $item)

            <tr class="border-t hover:bg-gray-50">

                <td class="p-3">
                    {{ $index + 1 }}
                </td>

                <td class="p-3 font-medium">
                    {{ $item->name }}
                </td>

                <td class="p-3">
                    {{ $item->email }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3"
                    class="text-center p-5 text-gray-500">

                    Tidak ada data kasir

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection