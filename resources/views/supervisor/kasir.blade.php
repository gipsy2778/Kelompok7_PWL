@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Data Kasir
</h1>

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

            <tr class="border-t">

                <td class="p-3">
                    {{ $index + 1 }}
                </td>

                <td class="p-3">
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