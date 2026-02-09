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
            width: 100px;
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
    <!-- Kop Surat -->
    <div class="kop-surat">
        <table>
            <tr>
                <td class="kop-logo">
                    <img src="{{ public_path('assets/img/logo_terminal.png') }}" alt="Logo Terminal" style="width: 150px; height: 150px;">
                </td>
                <td class="kop-text">
                    <h2>PEMERINTAH KABUPATEN CILACAP</h2>
                    <h3>TERMINAL TIPE A BANGGA MBANGUN DESA CILACAP</h3>
                    <p>Jl. Gatot Subroto No.102, Karang Lor, Gunungsimping, Kec. Cilacap Tengah, Kabupaten Cilacap, Jawa Tengah 53224</p>
                    <p>Telp: (0282) 123456 | Email: gunungsimping.clp@gmail.com</p>
                </td>
                <td class="kop-logo">
                    <img src="{{ public_path('assets/img/logo_kemenhub.png') }}" alt="Logo Kemenhub" style="width: 90px; height: 90px;">
                </td>
            </tr>
        </table>
    </div>

    <div class="header">
        <h2>REKAP BULANAN DATA PRODUKSI</h2>
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