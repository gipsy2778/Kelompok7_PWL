@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">
    Monitoring Transaksi Cabang
</h1>

<form method="GET" class="mb-6 flex flex-wrap gap-2 items-end">

    <div>
        <label class="block text-sm mb-1">
            Filter Cepat
        </label>

        <select name="filter"
                class="border p-2 rounded">

            <option value="">Semua</option>

            <option value="hari_ini"
                {{ request('filter') == 'hari_ini' ? 'selected' : '' }}>
                Hari Ini
            </option>

            <option value="7_hari"
                {{ request('filter') == '7_hari' ? 'selected' : '' }}>
                7 Hari
            </option>

            <option value="bulan_ini"
                {{ request('filter') == 'bulan_ini' ? 'selected' : '' }}>
                Bulan Ini
            </option>

            <option value="tahun_ini"
                {{ request('filter') == 'tahun_ini' ? 'selected' : '' }}>
                Tahun Ini
            </option>

        </select>
    </div>


    <div>
        <label class="block text-sm mb-1">
            Tanggal Awal
        </label>

        <input type="date"
               name="tanggal_awal"
               value="{{ request('tanggal_awal') }}"
               class="border p-2 rounded">
    </div>


    <div>
        <label class="block text-sm mb-1">
            Tanggal Akhir
        </label>

        <input type="date"
               name="tanggal_akhir"
               value="{{ request('tanggal_akhir') }}"
               class="border p-2 rounded">
    </div>


    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Filter
    </button>

</form>

<table class="min-w-full bg-white rounded shadow">
    <thead>
        <tr>
            <th class="p-2">No</th>
            <th class="p-2">Cabang</th>
            <th class="p-2">Jumlah Transaksi</th>
            <th class="p-2">Total Omset</th>
            <th class="p-2">Transaksi Terakhir</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transaksi as $index => $t)
        <tr class="border-t">

            <td class="p-2">
                {{ $index + 1 }}
            </td>

            <td class="p-2">
                {{ $t->nama_cabang }}
            </td>

            <td class="p-2">
                {{ $t->jumlah_transaksi }}
            </td>

            <td class="p-2">
                Rp {{ number_format($t->total_pendapatan) }}
            </td>

            <td class="p-2">
                {{ $t->transaksi_terakhir }}
            </td>

            <td class="p-2">
                <a href="/transaksi/cabang/{{ $t->id }}?
                    filter={{ request('filter') }}
                    &tanggal_awal={{ request('tanggal_awal') }}
                    &tanggal_akhir={{ request('tanggal_akhir') }}"
                    class="bg-blue-500 text-white px-3 py-1 rounded">

                    Detail

                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection