<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rekap Bulanan Produksi - {{ $tahun }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 18px;
        }

        .header p {
            margin: 3px 0;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 4px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            font-size: 9px;
        }

        .total-row {
            background-color: #333;
            color: white;
            font-weight: bold;
        }

        .bulan-col {
            text-align: left;
            font-weight: bold;
        }

        .keterangan {
            margin-top: 15px;
            font-size: 9px;
        }

        .keterangan strong {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Rekap Bulanan Data Produksi</h2>
        <p>Terminal Penumpang Tipe B Cilacap</p>
        <p>Tahun: <strong>{{ $tahun }}</strong></p>
        <p>Tanggal Cetak: {{ $tanggal_cetak }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th rowspan="2">BULAN</th>
                <th colspan="4">AKAP</th>
                <th colspan="4">AKDP</th>
            </tr>
            <tr>
                <!-- AKAP -->
                <th>Bis Datang</th>
                <th>Pnp Datang</th>
                <th>Bis Berangkat</th>
                <th>Pnp Berangkat</th>
                <!-- AKDP -->
                <th>Bis Datang</th>
                <th>Pnp Datang</th>
                <th>Bis Berangkat</th>
                <th>Pnp Berangkat</th>
            </tr>
        </thead>
        <tbody>
            @php
            $bulanNama = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            @endphp
            @foreach($rekapData as $item)
            <tr>
                <td class="bulan-col">{{ $bulanNama[$item['bulan']] }}</td>
                <!-- AKAP -->
                <td>{{ number_format($item['akap']['bis_datang']) }}</td>
                <td>{{ number_format($item['akap']['penumpang_datang']) }}</td>
                <td>{{ number_format($item['akap']['bis_berangkat']) }}</td>
                <td>{{ number_format($item['akap']['penumpang_berangkat']) }}</td>
                <!-- AKDP -->
                <td>{{ number_format($item['akdp']['bis_datang']) }}</td>
                <td>{{ number_format($item['akdp']['penumpang_datang']) }}</td>
                <td>{{ number_format($item['akdp']['bis_berangkat']) }}</td>
                <td>{{ number_format($item['akdp']['penumpang_berangkat']) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td class="bulan-col">TOTAL</td>
                <!-- AKAP -->
                <td>{{ number_format($totals['akap']['bis_datang']) }}</td>
                <td>{{ number_format($totals['akap']['penumpang_datang']) }}</td>
                <td>{{ number_format($totals['akap']['bis_berangkat']) }}</td>
                <td>{{ number_format($totals['akap']['penumpang_berangkat']) }}</td>
                <!-- AKDP -->
                <td>{{ number_format($totals['akdp']['bis_datang']) }}</td>
                <td>{{ number_format($totals['akdp']['penumpang_datang']) }}</td>
                <td>{{ number_format($totals['akdp']['bis_berangkat']) }}</td>
                <td>{{ number_format($totals['akdp']['penumpang_berangkat']) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="keterangan">
        <strong>Keterangan:</strong><br>
        AKAP (Antar Kota Antar Provinsi) | AKDP (Antar Kota Dalam Provinsi) | Pnp (Penumpang)
    </div>
</body>

</html>