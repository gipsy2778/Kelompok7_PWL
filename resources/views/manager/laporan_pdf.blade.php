<!DOCTYPE html>
<html>

<head>

    <title>Laporan Manager</title>

    <style>

        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .summary {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th {
            background: #f3f4f6;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

    </style>

</head>

<body>

    <h2>
        LAPORAN TRANSAKSI CABANG
    </h2>

    <div class="summary">

        <p>
            <strong>Total Pendapatan :</strong>
            Rp {{ number_format($totalPendapatan,0,',','.') }}
        </p>

        <p>
            <strong>Total Transaksi :</strong>
            {{ $totalTransaksi }}
        </p>

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Kode Transaksi</th>

                <th>Tanggal</th>

                <th>Kasir</th>

                <th>Total</th>

            </tr>

        </thead>

        <tbody>

            @foreach($transaksi as $i => $t)

            <tr>

                <td>
                    {{ $i + 1 }}
                </td>

                <td>
                    {{ $t->kode_transaksi }}
                </td>

                <td>
                    {{ \Carbon\Carbon::parse($t->tanggal)->format('d-m-Y') }}
                </td>

                <td>
                    {{ $t->nama_kasir }}
                </td>

                <td class="text-right">
                    Rp {{ number_format($t->total,0,',','.') }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>