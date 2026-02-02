<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Produksi - {{ $bulan }} {{ $tahun }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 9px;
            margin: 20px;
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

        table th {
            background-color: #1ab394;
            color: white;
            padding: 8px 5px;
            font-size: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table td {
            padding: 6px 5px;
            border: 1px solid #ddd;
            font-size: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            font-size: 8px;
            text-align: right;
        }

        .no-col {
            width: 3%;
            text-align: center;
        }

        .kendaraan-col {
            width: 8%;
            text-align: center;
        }

        .small-col {
            width: 6%;
            text-align: center;
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
        <h2>LAPORAN DATA PRODUKSI BUS</h2>
        <p>Periode: {{ $bulan }} {{ $tahun }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="no-col">No</th>
                <th>Nama PO</th>
                <th class="kendaraan-col">No Kendaraan</th>
                <th>Jenis Trayek</th>
                <th>Asal Tujuan</th>
                <th>Data Trayek</th>
                <th>Provinsi</th>
                <th>Terminal Tujuan</th>
                <th>Kabupaten</th>
                <th class="small-col">Jml PNP Berangkat</th>
                <th class="small-col">Waktu Berangkat</th>
                <th class="small-col">Tgl Berangkat</th>
                <th class="small-col">Jml PNP Datang</th>
                <th class="small-col">Waktu Datang</th>
                <th class="small-col">Tgl Datang</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataProduksi as $key => $produksi)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $produksi->dataMaster->nama_po ?? '-' }}</td>
                <td class="text-center"><strong>{{ $produksi->no_kendaraan }}</strong></td>
                <td>{{ $produksi->dataMaster->jenis_trayek ?? '-' }}</td>
                <td>{{ $produksi->dataMaster->asal_tujuan ?? '-' }}</td>
                <td>{{ $produksi->dataMaster->data_trayek ?? '-' }}</td>
                <td>{{ $produksi->dataMaster->provinsi ?? '-' }}</td>
                <td>{{ $produksi->dataMaster->terminal_tujuan ?? '-' }}</td>
                <td>{{ $produksi->dataMaster->kabupaten ?? '-' }}</td>
                <td class="text-center">
                    {{ $produksi->jml_pnp_berangkat ?? '-' }}
                </td>
                <td class="text-center">
                    {{ $produksi->waktu_berangkat ? \Carbon\Carbon::parse($produksi->waktu_berangkat)->format('H:i') : '-' }}
                </td>
                <td class="text-center">
                    {{ $produksi->bus_berangkat ? \Carbon\Carbon::parse($produksi->bus_berangkat)->format('d-m-Y') : '-' }}
                </td>
                <td class="text-center">
                    {{ $produksi->jml_pnp_datang ?? '-' }}
                </td>
                <td class="text-center">
                    {{ $produksi->waktu_datang ? \Carbon\Carbon::parse($produksi->waktu_datang)->format('H:i') : '-' }}
                </td>
                <td class="text-center">
                    {{ $produksi->bus_datang ? \Carbon\Carbon::parse($produksi->bus_datang)->format('d-m-Y') : '-' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="15" class="text-center">Tidak ada data untuk periode ini</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ $tanggal_cetak }}</p>
        <p>Total Data: {{ count($dataProduksi) }} record</p>
    </div>
</body>

</html>