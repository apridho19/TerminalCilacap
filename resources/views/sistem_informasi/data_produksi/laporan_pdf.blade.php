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

        .kop-surat {
            border-bottom: 3px solid #000;
            padding-bottom: 0px;
            margin-bottom: 5px;
            position: relative;
        }

        .kop-surat table {
            width: 100%;
            border: none;
        }

        .kop-surat td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        .kop-logo {
            width: 80px;
            text-align: center;
        }

        .kop-logo img {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }

        .kop-text {
            text-align: center;
            padding: 0 10px;
        }

        .kop-text h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.2;
        }

        .kop-text h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            line-height: 1.1;
        }

        .kop-text p {
            margin: 0;
            font-size: 10px;
            line-height: 1.2;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 0;
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
    <!-- Kop Surat -->
    <div class="kop-surat">
        <table>
            <tr>
                <td class="kop-logo">
                    <img src="{{ public_path('assets/img/logo_terminal.png') }}" alt="Logo Terminal" style="width: 150px; height: 150px;">
                </td>
                <td class="kop-text">
                    <h2>TERMINAL TIPE A BANGGA MBANGUN DESA CILACAP</h2>
                    <p>Jl. Gatot Subroto No.102, Karang Lor, Gunungsimping, Kec. Cilacap Tengah, Kabupaten Cilacap, Jawa Tengah 53224</p>
                    <p>Telp: (0282) 123456 | Email: gunungsimping.clp@gmail.com</p>
                </td>
                <td class="kop-logo">
                    <img src="{{ public_path('assets/img/logo_kemenhub.png') }}" alt="Logo Kemenhub" style="width: 80px; height: 80px;">
                </td>
            </tr>
        </table>
    </div>

    <div class="header">
        <h2>LAPORAN DATA PRODUKSI HARIAN</h2>
        <p>Bulan: <strong>{{ $bulan }} {{ $tahun }}</strong></p>
        <!-- <p>Tanggal Cetak: {{ $tanggal_cetak }}</p> -->
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
                <th>Bus Datang</th>
                <th>Pnp Datang</th>
                <th>Pnp Turun</th>
                <th>Bus Berangkat</th>
                <th>Pnp Naik</th>
                <th>Pnp Berangkat</th>
                <!-- AKDP -->
                <th>Bus Datang</th>
                <th>Pnp Datang</th>
                <th>Pnp Turun</th>
                <th>Bus Berangkat</th>
                <th>Pnp Naik</th>
                <th>Pnp Berangkat</th>
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

    <!-- <div class="keterangan">
        <strong>Keterangan:</strong><br>
        B.D (Bis Datang) | P.D (Penumpang Datang) | P.T (Penumpang Turun) |
        B.B (Bis Berangkat) | P.N (Penumpang Naik) | P.B (Penumpang Berangkat)
    </div> -->
</body>

</html>