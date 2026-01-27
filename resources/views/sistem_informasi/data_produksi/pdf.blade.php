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

        .header {
            text-align: center;
            margin-bottom: 20px;
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
    <div class="header">
        <h2>LAPORAN DATA PRODUKSI BUS</h2>
        <h2>TERMINAL CILACAP</h2>
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