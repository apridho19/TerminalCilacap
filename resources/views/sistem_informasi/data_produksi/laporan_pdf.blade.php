<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Produksi Harian - {{ $bulan }} {{ $tahun }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 9px;
            margin: 0;
            padding: 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 16px;
        }

        .header p {
            margin: 3px 0;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px 2px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            font-size: 8px;
        }

        .total-row {
            background-color: #333;
            color: white;
            font-weight: bold;
        }

        .keterangan {
            margin-top: 15px;
            font-size: 8px;
        }

        .keterangan strong {
            font-size: 9px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Data Produksi Harian</h2>
        <p>Terminal Penumpang Tipe B Cilacap</p>
        <p>Bulan: <strong>{{ $bulan }} {{ $tahun }}</strong></p>
        <p>Tanggal Cetak: {{ $tanggal_cetak }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th rowspan="2">TANGGAL</th>
                <th colspan="6">AKAP</th>
                <th colspan="6">AKDP</th>
            </tr>
            <tr>
                <!-- AKAP -->
                <th>B.D</th>
                <th>P.D</th>
                <th>P.T</th>
                <th>B.B</th>
                <th>P.N</th>
                <th>P.B</th>
                <!-- AKDP -->
                <th>B.D</th>
                <th>P.D</th>
                <th>P.T</th>
                <th>B.B</th>
                <th>P.N</th>
                <th>P.B</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanData as $item)
            <tr>
                <td>{{ $item['tanggal'] }}</td>
                <!-- AKAP -->
                <td>{{ $item['akap']['bis_datang'] }}</td>
                <td>{{ $item['akap']['penumpang_datang'] }}</td>
                <td>{{ $item['akap']['penumpang_turun'] }}</td>
                <td>{{ $item['akap']['bis_berangkat'] }}</td>
                <td>{{ $item['akap']['penumpang_naik'] }}</td>
                <td>{{ $item['akap']['penumpang_berangkat'] }}</td>
                <!-- AKDP -->
                <td>{{ $item['akdp']['bis_datang'] }}</td>
                <td>{{ $item['akdp']['penumpang_datang'] }}</td>
                <td>{{ $item['akdp']['penumpang_turun'] }}</td>
                <td>{{ $item['akdp']['bis_berangkat'] }}</td>
                <td>{{ $item['akdp']['penumpang_naik'] }}</td>
                <td>{{ $item['akdp']['penumpang_berangkat'] }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td>TOTAL</td>
                <!-- AKAP -->
                <td>{{ $totals['akap']['bis_datang'] }}</td>
                <td>{{ $totals['akap']['penumpang_datang'] }}</td>
                <td>{{ $totals['akap']['penumpang_turun'] }}</td>
                <td>{{ $totals['akap']['bis_berangkat'] }}</td>
                <td>{{ $totals['akap']['penumpang_naik'] }}</td>
                <td>{{ $totals['akap']['penumpang_berangkat'] }}</td>
                <!-- AKDP -->
                <td>{{ $totals['akdp']['bis_datang'] }}</td>
                <td>{{ $totals['akdp']['penumpang_datang'] }}</td>
                <td>{{ $totals['akdp']['penumpang_turun'] }}</td>
                <td>{{ $totals['akdp']['bis_berangkat'] }}</td>
                <td>{{ $totals['akdp']['penumpang_naik'] }}</td>
                <td>{{ $totals['akdp']['penumpang_berangkat'] }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="keterangan">
        <strong>Keterangan:</strong><br>
        B.D (Bis Datang) | P.D (Penumpang Datang) | P.T (Penumpang Turun) |
        B.B (Bis Berangkat) | P.N (Penumpang Naik) | P.B (Penumpang Berangkat)
    </div>
</body>

</html>