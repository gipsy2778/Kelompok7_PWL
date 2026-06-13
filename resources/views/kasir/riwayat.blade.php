@extends('layouts.app')

@section('content')

@if(session('success'))
<div id="notif"
     class="fixed inset-0 flex items-center justify-center bg-black/40 z-50">

    <div class="bg-green-500 text-white px-8 py-5 rounded-xl shadow-xl text-lg">
        ✅ {{ session('success') }}
    </div>

</div>

<script>
setTimeout(() => {
    document.getElementById('notif').remove();
}, 2000);
</script>
@endif

<h1 class="text-2xl font-bold mb-6">
    Riwayat Transaksi
</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">
                    No
                </th>

                <th class="p-3 text-left">
                    Kode Transaksi
                </th>

                <th class="p-3 text-left">
                    Tanggal
                </th>

                <th class="p-3 text-left">
                    Total
                </th>

                <th class="p-3 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($riwayat as $index => $item)

            <tr class="border-t">

                <td class="p-3">
                    {{ $riwayat->firstItem() + $index }}
                </td>

                <td class="p-3 font-medium">
                    {{ $item->kode_transaksi }}
                </td>

                <td class="p-3">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y H:i') }}
                </td>

                <td class="p-3 font-semibold text-green-600">
                    Rp {{ number_format($item->total) }}
                </td>

                <td class="p-3">

                    <a href="/kasir/detail/{{ $item->id }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">

                        Detail

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5"
                    class="p-5 text-center text-gray-500">

                    Belum ada transaksi

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-4">
    {{ $riwayat->links() }}
</div>

@endsection