@extends('sistem_informasi.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Data Produksi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Data Produksi</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-data-produksi" role="tab" aria-selected="true">
                        <i class="fa fa-database"></i> Data Produksi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-laporan-harian" role="tab" aria-selected="false">
                        <i class="fa fa-file-text-o"></i> Laporan Harian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-rekap-bulanan" role="tab" aria-selected="false">
                        <i class="fa fa-calendar"></i> Rekap Bulanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-grafik" role="tab" aria-selected="false">
                        <i class="fa fa-bar-chart"></i> Grafik Produksi
                    </a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Tab Data Produksi -->
                <div class="tab-pane fade show active" id="tab-data-produksi" role="tabpanel">
                    <!-- Statistik Hari Ini -->
                    <div class="row mb-4 mt-3">
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-success color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong">{{ $totalBusBerangkatHariIni }}</h2>
                                    <div class="m-b-5">BUS BERANGKAT HARI INI</div>
                                    <i class="fa fa-bus widget-stat-icon"></i>
                                    <div><i class="fa fa-users m-r-5"></i><small>{{ $totalPenumpangBerangkatHariIni }} Penumpang</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-info color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong">{{ $totalBusDatangHariIni }}</h2>
                                    <div class="m-b-5">BUS DATANG HARI INI</div>
                                    <i class="fa fa-bus widget-stat-icon"></i>
                                    <div><i class="fa fa-users m-r-5"></i><small>{{ $totalPenumpangDatangHariIni }} Penumpang</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-warning color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong">{{ $totalBusBerangkatHariIni + $totalBusDatangHariIni }}</h2>
                                    <div class="m-b-5">TOTAL TRANSAKSI HARI INI</div>
                                    <i class="fa fa-bar-chart widget-stat-icon"></i>
                                    <div><i class="fa fa-exchange m-r-5"></i><small>Keberangkatan + Kedatangan</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-danger color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong">{{ $totalPenumpangBerangkatHariIni + $totalPenumpangDatangHariIni }}</h2>
                                    <div class="m-b-5">TOTAL PENUMPANG HARI INI</div>
                                    <i class="fa fa-users widget-stat-icon"></i>
                                    <div><i class="fa fa-calendar m-r-5"></i><small>{{ date('d/m/Y') }}</small></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Data Produksi - Keberangkatan & Kedatangan</div>
                            <div class="ibox-tools">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalExport">
                                    <i class="fa fa-file-excel-o"></i> Export Excel
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExportPdf">
                                    <i class="fa fa-file-pdf-o"></i> Export PDF
                                </button>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Filter Form -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">
                                        <i class="fa fa-filter"></i> Filter Data
                                    </h5>
                                    <form action="{{ route('dataproduksi.index') }}" method="GET" id="filterForm" autocomplete="off">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="jenis_trayek" class="font-strong">Jenis Trayek</label>
                                                <select class="form-control" name="jenis_trayek">
                                                    <option value="">-- Semua Jenis Trayek --</option>
                                                    @foreach ($jenisTrayekList as $jt)
                                                    <option value="{{ $jt }}" {{ request('jenis_trayek') == $jt ? 'selected' : '' }}>
                                                        {{ $jt }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-4 mb-3">
                                                <label for="asal_tujuan" class="font-strong">Asal - Tujuan</label>
                                                <select class="form-control" name="asal_tujuan">
                                                    <option value="">-- Semua Asal Tujuan --</option>
                                                    @foreach ($asalTujuanList as $at)
                                                    <option value="{{ $at }}" {{ request('asal_tujuan') == $at ? 'selected' : '' }}>
                                                        {{ $at }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="provinsi" class="font-strong">Provinsi</label>
                                                <select class="form-control" id="provinsi" name="provinsi" autocomplete="off">
                                                    <option value="" {{ empty($provinsi) ? 'selected' : '' }}>-- Semua Provinsi --</option>
                                                    @foreach($provinsiList as $prov)
                                                    <option value="{{ $prov }}" {{ $provinsi == $prov ? 'selected' : '' }}>{{ $prov }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="terminal_tujuan" class="font-strong">Terminal Tujuan</label>
                                                <select class="form-control" id="terminal_tujuan" name="terminal_tujuan" autocomplete="off">
                                                    <option value="" {{ empty($terminalTujuan) ? 'selected' : '' }}>-- Semua Terminal --</option>
                                                    @foreach($terminalTujuanList as $tt)
                                                    <option value="{{ $tt }}" {{ $terminalTujuan == $tt ? 'selected' : '' }}>{{ $tt }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="kabupaten" class="font-strong">Kabupaten</label>
                                                <select class="form-control" id="kabupaten" name="kabupaten" autocomplete="off">
                                                    <option value="" {{ empty($kabupaten) ? 'selected' : '' }}>-- Semua Kabupaten --</option>
                                                    @foreach($kabupatenList as $kab)
                                                    <option value="{{ $kab }}" {{ $kabupaten == $kab ? 'selected' : '' }}>{{ $kab }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="tanggal" class="font-strong">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $tanggal ?? '' }}" placeholder="dd / mm / yyyy" autocomplete="off">
                                            </div>
                                            <div class="col-md-4 mb-3 d-flex align-items-end">
                                                <button type="submit" class="btn btn-primary mr-2">
                                                    <i class="fa fa-search"></i> Filter
                                                </button>
                                                <button type="button" id="btnResetFilter" class="btn btn-secondary">
                                                    <i class="fa fa-refresh"></i> Reset
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                                <table id="example-table" class="table table-striped table-bordered" style="width: 100%; white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2" style="min-width: 50px;">No</th>
                                            <th class="text-center" rowspan="2" style="min-width: 150px;">Nama PO</th>
                                            <th class="text-center" rowspan="2" style="min-width: 120px;">No Kendaraan</th>
                                            <th class="text-center" rowspan="2" style="min-width: 100px;">Jenis Trayek</th>
                                            <th class="text-center" rowspan="2" style="min-width: 200px;">Asal - Tujuan</th>
                                            <th class="text-center" rowspan="2" style="min-width: 150px;">Data Trayek</th>
                                            <th class="text-center" rowspan="2" style="min-width: 120px;">Provinsi</th>
                                            <th class="text-center" rowspan="2" style="min-width: 150px;">Terminal Tujuan</th>
                                            <th class="text-center" rowspan="2" style="min-width: 120px;">Kabupaten</th>
                                            <th class="text-center" colspan="3">Keberangkatan</th>
                                            <th class="text-center" colspan="3">Kedatangan</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="min-width: 100px;">Jumlah Penumpang</th>
                                            <th class="text-center" style="min-width: 100px;">Waktu</th>
                                            <th class="text-center" style="min-width: 120px;">Tanggal</th>
                                            <th class="text-center" style="min-width: 100px;">Jumlah Penumpang</th>
                                            <th class="text-center" style="min-width: 100px;">Waktu</th>
                                            <th class="text-center" style="min-width: 120px;">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dataProduksiPaginated as $index => $produksi)
                                        <tr>
                                            <td class="text-center">{{ ($dataProduksiPaginated->currentPage() - 1) * $dataProduksiPaginated->perPage() + $loop->iteration }}</td>
                                            <td>{{ $produksi->dataMaster->nama_po ?? '-' }}</td>
                                            <td class="text-center">{{ $produksi->no_kendaraan }}</td>
                                            <td class="text-center">{{ $produksi->dataMaster->jenis_trayek ?? '-' }}</td>
                                            <td>{{ $produksi->dataMaster->asal_tujuan ?? '-' }}</td>
                                            <td>{{ $produksi->dataMaster->data_trayek ?? '-' }}</td>
                                            <td class="text-center">{{ $produksi->dataMaster->provinsi ?? '-' }}</td>
                                            <td>{{ $produksi->dataMaster->terminal_tujuan ?? '-' }}</td>
                                            <td class="text-center">{{ $produksi->dataMaster->kabupaten ?? '-' }}</td>
                                            <td class="text-center">{{ $produksi->jml_pnp_berangkat ?? '-' }}</td>
                                            <td class="text-center">{{ $produksi->waktu_berangkat ? \Carbon\Carbon::parse($produksi->waktu_berangkat)->format('H:i') : '-' }}</td>
                                            <td class="text-center">{{ $produksi->bus_berangkat ? \Carbon\Carbon::parse($produksi->bus_berangkat)->format('d-m-Y') : '-' }}</td>
                                            <td class="text-center">{{ $produksi->jml_pnp_datang ?? '-' }}</td>
                                            <td class="text-center">{{ $produksi->waktu_datang ? \Carbon\Carbon::parse($produksi->waktu_datang)->format('H:i') : '-' }}</td>
                                            <td class="text-center">{{ $produksi->bus_datang ? \Carbon\Carbon::parse($produksi->bus_datang)->format('d-m-Y') : '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    Menampilkan {{ $dataProduksiPaginated->firstItem() ?? 0 }} sampai {{ $dataProduksiPaginated->lastItem() ?? 0 }} dari {{ $dataProduksiPaginated->total() }} data
                                </div>
                                <div>
                                    {{ $dataProduksiPaginated->appends(request()->query())->links() }}
                                </div>
                            </div>

                            <!-- Summary Cards - Hanya tampil saat ada filter -->
                            @if($jenisTrayek || $asalTujuan || $provinsi || $terminalTujuan || $kabupaten || $tanggal)
                            <div class="mt-4">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body p-0">
                                        <div class="bg-light border-bottom px-4 py-3">
                                            <h6 class="mb-0 font-weight-bold text-dark">
                                                <i class="fa fa-chart-bar"></i> Ringkasan Data Berdasarkan Filter
                                            </h6>
                                        </div>
                                        <div class="p-4">
                                            <div class="row">
                                                <!-- AKAP -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="border rounded p-3 h-100" style="border-left: 4px solid #5c6bc0 !important;">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <div class="rounded-circle d-flex align-items-center justify-content-center mr-3" style="width: 50px; height: 50px; background-color: #e8eaf6;">
                                                                <i class="fa fa-bus fa-lg" style="color: #5c6bc0;"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0 font-weight-bold" style="color: #5c6bc0;">AKAP</h6>
                                                                <small class="text-muted">Antar Kota Antar Provinsi</small>
                                                            </div>
                                                        </div>
                                                        <div class="row text-center">
                                                            <div class="col-6 border-right">
                                                                <h4 class="mb-0 font-weight-bold" style="color: #5c6bc0;">{{ $totalAkapBusBerangkat }}</h4>
                                                                <small class="text-muted">Bus Berangkat</small>
                                                            </div>
                                                            <div class="col-6">
                                                                <h4 class="mb-0 font-weight-bold" style="color: #5c6bc0;">{{ $totalAkapBusDatang }}</h4>
                                                                <small class="text-muted">Bus Datang</small>
                                                            </div>
                                                        </div>
                                                        <hr class="my-3">
                                                        <div class="row text-center">
                                                            <div class="col-6 border-right">
                                                                <h5 class="mb-0 font-weight-bold text-dark">{{ number_format($totalAkapPnpBerangkat) }}</h5>
                                                                <small class="text-muted"><i class="fa fa-users"></i> Pnp Berangkat</small>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-0 font-weight-bold text-dark">{{ number_format($totalAkapPnpDatang) }}</h5>
                                                                <small class="text-muted"><i class="fa fa-users"></i> Pnp Datang</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- AKDP -->
                                                <div class="col-md-6 mb-3">
                                                    <div class="border rounded p-3 h-100" style="border-left: 4px solid #66bb6a !important;">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <div class="rounded-circle d-flex align-items-center justify-content-center mr-3" style="width: 50px; height: 50px; background-color: #e8f5e9;">
                                                                <i class="fa fa-bus fa-lg" style="color: #66bb6a;"></i>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0 font-weight-bold" style="color: #66bb6a;">AKDP</h6>
                                                                <small class="text-muted">Antar Kota Dalam Provinsi</small>
                                                            </div>
                                                        </div>
                                                        <div class="row text-center">
                                                            <div class="col-6 border-right">
                                                                <h4 class="mb-0 font-weight-bold" style="color: #66bb6a;">{{ $totalAkdpBusBerangkat }}</h4>
                                                                <small class="text-muted">Bus Berangkat</small>
                                                            </div>
                                                            <div class="col-6">
                                                                <h4 class="mb-0 font-weight-bold" style="color: #66bb6a;">{{ $totalAkdpBusDatang }}</h4>
                                                                <small class="text-muted">Bus Datang</small>
                                                            </div>
                                                        </div>
                                                        <hr class="my-3">
                                                        <div class="row text-center">
                                                            <div class="col-6 border-right">
                                                                <h5 class="mb-0 font-weight-bold text-dark">{{ number_format($totalAkdpPnpBerangkat) }}</h5>
                                                                <small class="text-muted"><i class="fa fa-users"></i> Pnp Berangkat</small>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="mb-0 font-weight-bold text-dark">{{ number_format($totalAkdpPnpDatang) }}</h5>
                                                                <small class="text-muted"><i class="fa fa-users"></i> Pnp Datang</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- END Tab Data Produksi -->

                <!-- Tab Laporan Harian -->
                <div class="tab-pane fade" id="tab-laporan-harian" role="tabpanel">
                    <div class="ibox mt-3">
                        <div class="ibox-head">
                            <div class="ibox-title">Data Produksi Harian</div>
                            <div class="ibox-tools">
                                <button type="button" class="btn btn-danger btn-sm" id="btnExportPdfLaporan">
                                    <i class="fa fa-file-pdf-o"></i> Export ke PDF
                                </button>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Filter Bulan dan Tahun -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="pilih_bulan" class="font-strong">Pilih Bulan:</label>
                                    <select class="form-control" id="pilih_bulan">
                                        <option value="1" {{ date('m') == '01' ? 'selected' : '' }}>Januari</option>
                                        <option value="2" {{ date('m') == '02' ? 'selected' : '' }}>Februari</option>
                                        <option value="3" {{ date('m') == '03' ? 'selected' : '' }}>Maret</option>
                                        <option value="4" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
                                        <option value="5" {{ date('m') == '05' ? 'selected' : '' }}>Mei</option>
                                        <option value="6" {{ date('m') == '06' ? 'selected' : '' }}>Juni</option>
                                        <option value="7" {{ date('m') == '07' ? 'selected' : '' }}>Juli</option>
                                        <option value="8" {{ date('m') == '08' ? 'selected' : '' }}>Agustus</option>
                                        <option value="9" {{ date('m') == '09' ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>Oktober</option>
                                        <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="pilih_tahun" class="font-strong">Pilih Tahun:</label>
                                    <select class="form-control" id="pilih_tahun">
                                        @for($year = date('Y'); $year >= 2020; $year--)
                                        <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-primary" id="btnLoadData">
                                        <i class="fa fa-refresh"></i> Load Data
                                    </button>
                                </div>
                            </div>

                            <!-- Table Laporan Harian -->
                            <div class="table-responsive" id="tableContainer">
                                <table class="table table-bordered table-striped" id="tableLaporanHarian">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2">TANGGAL</th>
                                            <th class="text-center" colspan="6">AKAP</th>
                                            <th class="text-center" colspan="6">AKDP</th>
                                        </tr>
                                        <tr>
                                            <!-- AKAP -->
                                            <th class="text-center">Bus Datang</th>
                                            <th class="text-center">Pnp Datang</th>
                                            <th class="text-center">Pnp Turun</th>
                                            <th class="text-center">Bus Berangkat</th>
                                            <th class="text-center">Pnp Naik</th>
                                            <th class="text-center">Pnp Berangkat</th>
                                            <!-- AKDP -->
                                            <th class="text-center">Bus Datang</th>
                                            <th class="text-center">Pnp Datang</th>
                                            <th class="text-center">Pnp Turun</th>
                                            <th class="text-center">Bus Berangkat</th>
                                            <th class="text-center">Pnp Naik</th>
                                            <th class="text-center">Pnp Berangkat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="laporanHarianBody">
                                        <tr>
                                            <td colspan="13" class="text-center">Silakan pilih bulan dan tahun, kemudian klik Load Data</td>
                                        </tr>
                                    </tbody>
                                    <tfoot id="laporanHarianFooter">
                                        <tr class="bg-dark text-white font-strong">
                                            <td class="text-center">TOTAL</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Keterangan -->
                            <!-- <div class="mt-3">
                                <strong>Keterangan:</strong><br>
                                B.D (Bis Datang)<br>
                                P.D (Penumpang Datang)<br>
                                P.T (Penumpang Turun)<br>
                                B.B (Bis Berangkat)<br>
                                P.N (Penumpang Naik)<br>
                                P.B (Penumpang Berangkat)
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- END Tab Laporan Harian -->

                <!-- Tab Rekap Bulanan -->
                <div class="tab-pane fade" id="tab-rekap-bulanan" role="tabpanel">
                    <div class="ibox mt-3">
                        <div class="ibox-head">
                            <div class="ibox-title">Rekap Bulanan - Tahun <span id="tahun_rekap_display">{{ date('Y') }}</span></div>
                            <div class="ibox-tools">
                                <button type="button" class="btn btn-danger btn-sm" id="btnExportPdfRekap">
                                    <i class="fa fa-file-pdf-o"></i> Export ke PDF
                                </button>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <!-- Filter Tahun -->
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="tahun_rekap" class="font-strong">Pilih Tahun:</label>
                                    <select class="form-control" id="tahun_rekap" name="tahun_rekap">
                                        @for($year = date('Y'); $year >= 2020; $year--)
                                        <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-primary" id="btnLoadRekap">
                                        <i class="fa fa-refresh"></i> Tampilkan
                                    </button>
                                </div>
                            </div>

                            <!-- Table Rekap Bulanan -->
                            <div class="table-responsive" id="rekapTableContainer">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" rowspan="2">BULAN</th>
                                            <th class="text-center" colspan="4">AKAP</th>
                                            <th class="text-center" colspan="4">AKDP</th>
                                        </tr>
                                        <tr>
                                            <!-- AKAP -->
                                            <th class="text-center">Bis Datang</th>
                                            <th class="text-center">Pnp Datang</th>
                                            <th class="text-center">Bis Berangkat</th>
                                            <th class="text-center">Pnp Berangkat</th>
                                            <!-- AKDP -->
                                            <th class="text-center">Bis Datang</th>
                                            <th class="text-center">Pnp Datang</th>
                                            <th class="text-center">Bis Berangkat</th>
                                            <th class="text-center">Pnp Berangkat</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rekapTableBody">
                                        <tr>
                                            <td colspan="9" class="text-center">Klik "Tampilkan" untuk memuat data</td>
                                        </tr>
                                    </tbody>
                                    <tfoot id="rekapTableFooter">
                                        <tr class="bg-dark text-white font-strong">
                                            <td class="text-center">TOTAL</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Keterangan -->
                            <div class="mt-3">
                                <strong>Keterangan:</strong><br>
                                <span class="badge badge-info">AKAP</span> = Antar Kota Antar Provinsi<br>
                                <span class="badge badge-success">AKDP</span> = Antar Kota Dalam Provinsi<br>
                                <span class="badge badge-secondary">Pnp</span> = Penumpang
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Tab Rekap Bulanan -->

                <!-- Tab Grafik Produksi -->
                <div class="tab-pane fade" id="tab-grafik" role="tabpanel">
                    <!-- Filter Card -->
                    <div class="ibox mt-3">
                        <div class="ibox-head">
                            <div class="ibox-title">Filter Data</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jenis_grafik" class="font-strong">Jenis Grafik:</label>
                                        <select class="form-control" id="jenis_grafik">
                                            <option value="harian">Data Harian (per Hari)</option>
                                            <option value="bulanan">Data Bulanan (per Bulan)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="bulan_filter_grafik">
                                    <div class="form-group">
                                        <label for="bulan_grafik" class="font-strong">Pilih Bulan:</label>
                                        <select class="form-control" id="bulan_grafik">
                                            @for($m = 1; $m <= 12; $m++)
                                                <option value="{{ $m }}" {{ $m == date('m') ? 'selected' : '' }}>
                                                {{ ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'][$m] }}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tahun_grafik" class="font-strong">Pilih Tahun:</label>
                                        <select class="form-control" id="tahun_grafik">
                                            @for($year = date('Y'); $year >= 2020; $year--)
                                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-primary" id="btnLoadGrafik">
                                        <i class="fa fa-bar-chart"></i> Tampilkan Grafik
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik Card -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Grafik Bis dan Penumpang</div>
                                </div>
                                <div class="ibox-body">
                                    <canvas id="grafikProduksi" height="80"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Cards -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-info color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong" id="stat_akap_bis">0</h2>
                                    <div class="m-b-5">Total Bis AKAP</div>
                                    <i class="ti-truck widget-stat-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-success color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong" id="stat_akap_pnp">0</h2>
                                    <div class="m-b-5">Total Penumpang AKAP</div>
                                    <i class="ti-user widget-stat-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-warning color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong" id="stat_akdp_bis">0</h2>
                                    <div class="m-b-5">Total Bis AKDP</div>
                                    <i class="ti-truck widget-stat-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="ibox bg-danger color-white widget-stat">
                                <div class="ibox-body">
                                    <h2 class="m-b-5 font-strong" id="stat_akdp_pnp">0</h2>
                                    <div class="m-b-5">Total Penumpang AKDP</div>
                                    <i class="ti-user widget-stat-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Tab Grafik Produksi -->

        </div>
        <!-- END TAB CONTENT -->
    </div>
    <!-- END PAGE CONTENT-->

</div>
</div>

<!-- Modal Export Excel -->
<div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalExportLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExportLabel">
                    <i class="fa fa-file-excel-o"></i> Export Data ke Excel
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dataproduksi.export') }}" method="POST" id="formExport">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bulan_export" class="font-strong">Pilih Bulan <span class="text-danger">*</span></label>
                                <select class="form-control" id="bulan_export" name="bulan" required>
                                    <option value="">-- Pilih Bulan --</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_export" class="font-strong">Pilih Tahun <span class="text-danger">*</span></label>
                                <select class="form-control" id="tahun_export" name="tahun" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    @for($year = date('Y'); $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h6 class="font-strong mb-3"><i class="fa fa-filter"></i> Filter Export (Opsional)</h6>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jenis_trayek_export" class="font-strong">Jenis Trayek</label>
                                <select class="form-control" id="jenis_trayek_export" name="jenis_trayek">
                                    <option value="">-- Semua Jenis Trayek --</option>
                                    <option value="AKAP">AKAP</option>
                                    <option value="AKDP">AKDP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="provinsi_export" class="font-strong">Provinsi</label>
                                <select class="form-control" id="provinsi_export" name="provinsi">
                                    <option value="">-- Semua Provinsi --</option>
                                    @foreach($provinsiList as $prov)
                                    <option value="{{ $prov }}">{{ $prov }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kabupaten_export" class="font-strong">Kabupaten</label>
                                <select class="form-control" id="kabupaten_export" name="kabupaten">
                                    <option value="">-- Semua Kabupaten --</option>
                                    @foreach($kabupatenList as $kab)
                                    <option value="{{ $kab }}">{{ $kab }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="terminal_tujuan_export" class="font-strong">Terminal Tujuan</label>
                                <select class="form-control" id="terminal_tujuan_export" name="terminal_tujuan">
                                    <option value="">-- Semua Terminal --</option>
                                    @foreach($terminalTujuanList as $tt)
                                    <option value="{{ $tt }}">{{ $tt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn btn-info btn-sm" id="btnPreview">
                            <i class="fa fa-eye"></i> Preview Data
                        </button>
                    </div>

                    <div id="previewContainer" class="mt-3" style="display: none;">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0"><i class="fa fa-eye"></i> Preview Data yang akan diexport</h6>
                            </div>
                            <div class="card-body">
                                <div id="previewLoading" class="text-center py-4">
                                    <i class="fa fa-spinner fa-spin fa-2x"></i>
                                    <p class="mt-2">Memuat preview...</p>
                                </div>
                                <div id="previewContent" style="display: none;">
                                    <div class="alert alert-info">
                                        <strong>Total Data: <span id="previewTotal">0</span></strong>
                                    </div>
                                    <div style="max-height: 400px; overflow-y: auto;">
                                        <table class="table table-sm table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Kendaraan</th>
                                                    <th>Nama PO</th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>Terminal Tujuan</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="previewTableBody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-download"></i> Download Excel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Export PDF -->
<div class="modal fade" id="modalExportPdf" tabindex="-1" role="dialog" aria-labelledby="modalExportPdfLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExportPdfLabel">
                    <i class="fa fa-file-pdf-o"></i> Export Data ke PDF
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dataproduksi.export.pdf') }}" method="POST" id="formExportPdf">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bulan_pdf" class="font-strong">Pilih Bulan <span class="text-danger">*</span></label>
                                <select class="form-control" id="bulan_pdf" name="bulan" required>
                                    <option value="">-- Pilih Bulan --</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun_pdf" class="font-strong">Pilih Tahun <span class="text-danger">*</span></label>
                                <select class="form-control" id="tahun_pdf" name="tahun" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    @for($year = date('Y'); $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h6 class="font-strong mb-3"><i class="fa fa-filter"></i> Filter Export (Opsional)</h6>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jenis_trayek_pdf" class="font-strong">Jenis Trayek</label>
                                <select class="form-control" id="jenis_trayek_pdf" name="jenis_trayek">
                                    <option value="">-- Semua Jenis Trayek --</option>
                                    <option value="AKAP">AKAP</option>
                                    <option value="AKDP">AKDP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="provinsi_pdf" class="font-strong">Provinsi</label>
                                <select class="form-control" id="provinsi_pdf" name="provinsi">
                                    <option value="">-- Semua Provinsi --</option>
                                    @foreach($provinsiList as $prov)
                                    <option value="{{ $prov }}">{{ $prov }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kabupaten_pdf" class="font-strong">Kabupaten</label>
                                <select class="form-control" id="kabupaten_pdf" name="kabupaten">
                                    <option value="">-- Semua Kabupaten --</option>
                                    @foreach($kabupatenList as $kab)
                                    <option value="{{ $kab }}">{{ $kab }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="terminal_tujuan_pdf" class="font-strong">Terminal Tujuan</label>
                                <select class="form-control" id="terminal_tujuan_pdf" name="terminal_tujuan">
                                    <option value="">-- Semua Terminal --</option>
                                    @foreach($terminalTujuanList as $tt)
                                    <option value="{{ $tt }}">{{ $tt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn btn-info btn-sm" id="btnPreviewPdf">
                            <i class="fa fa-eye"></i> Preview Data
                        </button>
                    </div>

                    <div id="previewContainerPdf" class="mt-3" style="display: none;">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0"><i class="fa fa-eye"></i> Preview Data yang akan diexport</h6>
                            </div>
                            <div class="card-body">
                                <div id="previewLoadingPdf" class="text-center py-4">
                                    <i class="fa fa-spinner fa-spin fa-2x"></i>
                                    <p class="mt-2">Memuat preview...</p>
                                </div>
                                <div id="previewContentPdf" style="display: none;">
                                    <div class="alert alert-info">
                                        <strong>Total Data: <span id="previewTotalPdf">0</span></strong>
                                    </div>
                                    <div style="max-height: 400px; overflow-y: auto;">
                                        <table class="table table-sm table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Kendaraan</th>
                                                    <th>Nama PO</th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>Terminal Tujuan</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="previewTableBodyPdf">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-download"></i> Download PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

<!-- PAGINATION STYLES -->
<style>
    .pagination {
        margin: 0;
    }

    .pagination .page-item .page-link {
        padding: 0.5rem 0.75rem;
        margin: 0 0.25rem;
        border-radius: 0.25rem;
        color: #5c6bc0;
        border: 1px solid #dee2e6;
    }

    .pagination .page-item.active .page-link {
        background-color: #5c6bc0;
        border-color: #5c6bc0;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e8eaf6;
        border-color: #5c6bc0;
        color: #5c6bc0;
    }

    /* Tab Styles */
    .nav-tabs {
        border-bottom: 2px solid #dee2e6;
        margin-bottom: 0;
    }

    .nav-tabs .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #6c757d;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
    }

    .nav-tabs .nav-link:hover {
        border-bottom-color: #5c6bc0;
        color: #5c6bc0;
    }

    .nav-tabs .nav-link.active {
        border-bottom-color: #5c6bc0;
        color: #5c6bc0;
        background-color: transparent;
    }

    /* Table Laporan Harian Styles */
    #tableLaporanHarian thead th {
        background-color: #f8f9fa;
        font-weight: 600;
        vertical-align: middle;
    }

    #tableLaporanHarian tbody td {
        vertical-align: middle;
    }
</style>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    $(function() {
        console.log('✅ App started');
        console.log('✅ Button #btnLoadData:', $('#btnLoadData').length > 0);
        console.log('✅ Button #btnLoadRekap:', $('#btnLoadRekap').length > 0);
        console.log('✅ Button #btnLoadGrafik:', $('#btnLoadGrafik').length > 0);

        // Reset Filter Handler - Force hard reload from server
        $('#btnResetFilter').on('click', function(e) {
            e.preventDefault();

            // Gunakan location.replace untuk redirect tanpa menyimpan history
            // Tambah timestamp untuk bypass cache
            var cleanUrl = '{{ route("dataproduksi.index") }}?_reset=' + Date.now();
            window.location.replace(cleanUrl);
        });

        // Force set default values saat page load tanpa filter
        @if(empty($jenisTrayek) && empty($asalTujuan) && empty($provinsi) && empty($terminalTujuan) && empty($kabupaten) && empty($tanggal))
        // Selalu force set ke default saat page load tanpa filter
        $(document).ready(function() {
            // Hapus parameter _reset dari URL jika ada
            if (window.location.search.includes('_reset')) {
                var cleanUrl = '{{ route("dataproduksi.index") }}';
                window.history.replaceState({}, document.title, cleanUrl);
            }

            // Force set semua dropdown ke option pertama (index 0)
            setTimeout(function() {
                console.log('🔄 Setting default values...');
                $('#jenis_trayek').prop('selectedIndex', 0);
                $('#asal_tujuan').prop('selectedIndex', 0);
                $('#provinsi').prop('selectedIndex', 0);
                $('#terminal_tujuan').prop('selectedIndex', 0);
                $('#kabupaten').prop('selectedIndex', 0);
                $('#tanggal').val('');
                console.log('✅ Default values applied');
            }, 50);
        });
        @endif

        // DataTables dinonaktifkan karena menggunakan Laravel pagination
        // $('#example-table').DataTable({
        //     pageLength: 10,
        //     scrollX: true
        // });

        // Auto hide alert setelah 5 detik
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Set bulan saat ini di dropdown
        var currentMonth = new Date().getMonth() + 1;
        $('#pilih_bulan').val(currentMonth);

        // Auto load laporan harian saat tab diklik
        $(document).on('shown.bs.tab', 'a[data-toggle="tab"][href="#tab-laporan-harian"]', function() {
            var bulan = $('#pilih_bulan').val();
            var tahun = $('#pilih_tahun').val();
            loadLaporanHarian(bulan, tahun);
        });

        // Load Data Button Handler - Using event delegation
        $(document).on('click', '#btnLoadData', function() {
            console.log('✅ Button Load Data CLICKED!');
            console.log('Button element:', this);
            var bulan = $('#pilih_bulan').val();
            var tahun = $('#pilih_tahun').val();
            console.log('Bulan:', bulan, 'Tahun:', tahun);

            if (!bulan || !tahun) {
                alert('Bulan atau Tahun belum dipilih!');
                return;
            }

            loadLaporanHarian(bulan, tahun);
        });

        // Export PDF Laporan Handler - Using event delegation
        $(document).on('click', '#btnExportPdfLaporan', function() {
            var bulan = $('#pilih_bulan').val();
            var tahun = $('#pilih_tahun').val();

            if (!bulan || !tahun) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Silakan pilih bulan dan tahun terlebih dahulu!',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            // Get bulan name
            var bulanNama = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            // Show confirmation
            Swal.fire({
                title: 'Export Laporan ke PDF?',
                html: '<div style="text-align: left; padding: 10px;">' +
                    '<p style="margin: 5px 0;"><i class="fa fa-calendar" style="margin-right: 8px; color: #3085d6;"></i><strong>Bulan:</strong> ' + bulanNama[parseInt(bulan)] + '</p>' +
                    '<p style="margin: 5px 0;"><i class="fa fa-calendar-o" style="margin-right: 8px; color: #3085d6;"></i><strong>Tahun:</strong> ' + tahun + '</p>' +
                    '<p style="margin: 5px 0;"><i class="fa fa-file-pdf-o" style="margin-right: 8px; color: #d33;"></i><strong>Format:</strong> PDF Landscape A4</p>' +
                    '</div>',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fa fa-download"></i> Ya, Download PDF',
                cancelButtonText: '<i class="fa fa-times"></i> Batal',
                customClass: {
                    popup: 'animated fadeInDown'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: '<i class="fa fa-cog fa-spin"></i> Memproses...',
                        html: 'Sedang membuat file PDF<br><small>Mohon tunggu sebentar...</small>',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Create form and submit
                    var form = $('<form>', {
                        'method': 'POST',
                        'action': '{{ route("dataproduksi.export.laporan.pdf") }}',
                        'target': '_blank'
                    });

                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': '{{ csrf_token() }}'
                    }));

                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'bulan',
                        'value': bulan
                    }));

                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'tahun',
                        'value': tahun
                    }));

                    $('body').append(form);
                    form.submit();

                    // Close loading after a delay and show success
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'File PDF sedang diunduh...',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        form.remove();
                    }, 1500);
                }
            });
        });

        // Function to load laporan harian
        function loadLaporanHarian(bulan, tahun) {
            console.log('🔄 loadLaporanHarian called with bulan:', bulan, 'tahun:', tahun);
            console.log('🔄 Target tbody element exists:', $('#laporanHarianBody').length > 0);
            console.log('🔄 AJAX URL:', '{{ route("dataproduksi.laporan.harian") }}');

            // Show loading
            $('#laporanHarianBody').html('<tr><td colspan="13" class="text-center"><i class="fa fa-spinner fa-spin"></i> Memuat data...</td></tr>');
            console.log('🔄 Loading indicator displayed');

            $.ajax({
                url: '{{ route("dataproduksi.laporan.harian") }}',
                method: 'GET',
                data: {
                    bulan: bulan,
                    tahun: tahun
                },
                beforeSend: function() {
                    console.log('🔄 AJAX request starting...');
                },
                success: function(response) {
                    console.log('✅ Response received:', response);
                    if (response.success) {
                        console.log('✅ Success! Data count:', response.data ? response.data.length : 0);
                        renderLaporanTable(response.data, response.totals);
                    } else {
                        console.error('❌ Response success = false');
                        $('#laporanHarianBody').html('<tr><td colspan="13" class="text-center text-danger">Gagal memuat data</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('❌ AJAX Error:', status, error);
                    console.error('❌ Response:', xhr.responseText);
                    console.error('❌ Status Code:', xhr.status);
                    alert('Error: ' + error + '\nStatus: ' + xhr.status + '\nCek console untuk detail');
                    $('#laporanHarianBody').html('<tr><td colspan="13" class="text-center text-danger">Terjadi kesalahan saat memuat data. Cek console.</td></tr>');
                }
            });
        }

        // Function to render table
        function renderLaporanTable(data, totals) {
            var html = '';

            if (data.length === 0) {
                html = '<tr><td colspan="13" class="text-center">Tidak ada data untuk bulan dan tahun yang dipilih</td></tr>';
            } else {
                $.each(data, function(index, item) {
                    html += '<tr>';
                    html += '<td class="text-center">' + item.tanggal + '</td>';
                    // AKAP
                    html += '<td class="text-center">' + item.akap.bis_datang + '</td>';
                    html += '<td class="text-center">' + item.akap.penumpang_datang + '</td>';
                    html += '<td class="text-center">' + item.akap.penumpang_turun + '</td>';
                    html += '<td class="text-center">' + item.akap.bis_berangkat + '</td>';
                    html += '<td class="text-center">' + item.akap.penumpang_naik + '</td>';
                    html += '<td class="text-center">' + item.akap.penumpang_berangkat + '</td>';
                    // AKDP
                    html += '<td class="text-center">' + item.akdp.bis_datang + '</td>';
                    html += '<td class="text-center">' + item.akdp.penumpang_datang + '</td>';
                    html += '<td class="text-center">' + item.akdp.penumpang_turun + '</td>';
                    html += '<td class="text-center">' + item.akdp.bis_berangkat + '</td>';
                    html += '<td class="text-center">' + item.akdp.penumpang_naik + '</td>';
                    html += '<td class="text-center">' + item.akdp.penumpang_berangkat + '</td>';
                    html += '</tr>';
                });
            }

            $('#laporanHarianBody').html(html);

            // Update totals
            var footerHtml = '<tr class="bg-dark text-white font-strong">';
            footerHtml += '<td class="text-center">TOTAL</td>';
            footerHtml += '<td class="text-center">' + totals.akap.bis_datang + '</td>';
            footerHtml += '<td class="text-center">' + totals.akap.penumpang_datang + '</td>';
            footerHtml += '<td class="text-center">' + totals.akap.penumpang_turun + '</td>';
            footerHtml += '<td class="text-center">' + totals.akap.bis_berangkat + '</td>';
            footerHtml += '<td class="text-center">' + totals.akap.penumpang_naik + '</td>';
            footerHtml += '<td class="text-center">' + totals.akap.penumpang_berangkat + '</td>';
            footerHtml += '<td class="text-center">' + totals.akdp.bis_datang + '</td>';
            footerHtml += '<td class="text-center">' + totals.akdp.penumpang_datang + '</td>';
            footerHtml += '<td class="text-center">' + totals.akdp.penumpang_turun + '</td>';
            footerHtml += '<td class="text-center">' + totals.akdp.bis_berangkat + '</td>';
            footerHtml += '<td class="text-center">' + totals.akdp.penumpang_naik + '</td>';
            footerHtml += '<td class="text-center">' + totals.akdp.penumpang_berangkat + '</td>';
            footerHtml += '</tr>';

            $('#laporanHarianFooter').html(footerHtml);
        }

        // ==================== REKAP BULANAN FUNCTIONS ====================
        // Auto load rekap bulanan saat tab diklik
        $(document).on('shown.bs.tab', 'a[data-toggle="tab"][href="#tab-rekap-bulanan"]', function() {
            loadRekapBulanan();
        });

        $(document).on('click', '#btnLoadRekap', function() {
            console.log('Button Load Rekap clicked');
            loadRekapBulanan();
        });

        function loadRekapBulanan() {
            var tahun = $('#tahun_rekap').val();
            console.log('loadRekapBulanan called with tahun:', tahun);
            $('#tahun_rekap_display').text(tahun);

            Swal.fire({
                title: 'Memuat Data...',
                html: 'Sedang memproses rekap bulanan',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '{{ route("dataproduksi.rekap.bulanan") }}',
                method: 'GET',
                data: {
                    tahun: tahun,
                    ajax: true
                },
                success: function(response) {
                    Swal.close();

                    if (response.success) {
                        var tableBody = '';
                        var namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ];

                        $.each(response.data, function(index, item) {
                            tableBody += '<tr>';
                            tableBody += '<td class="text-center font-strong">' + namaBulan[item.bulan - 1] + '</td>';
                            // AKAP
                            tableBody += '<td class="text-center">' + item.akap.bis_datang.toLocaleString() + '</td>';
                            tableBody += '<td class="text-center">' + item.akap.penumpang_datang.toLocaleString() + '</td>';
                            tableBody += '<td class="text-center">' + item.akap.bis_berangkat.toLocaleString() + '</td>';
                            tableBody += '<td class="text-center">' + item.akap.penumpang_berangkat.toLocaleString() + '</td>';
                            // AKDP
                            tableBody += '<td class="text-center">' + item.akdp.bis_datang.toLocaleString() + '</td>';
                            tableBody += '<td class="text-center">' + item.akdp.penumpang_datang.toLocaleString() + '</td>';
                            tableBody += '<td class="text-center">' + item.akdp.bis_berangkat.toLocaleString() + '</td>';
                            tableBody += '<td class="text-center">' + item.akdp.penumpang_berangkat.toLocaleString() + '</td>';
                            tableBody += '</tr>';
                        });

                        $('#rekapTableBody').html(tableBody);

                        // Update footer totals
                        var footerHtml = '<tr class="bg-dark text-white font-strong">';
                        footerHtml += '<td class="text-center">TOTAL</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akap.bis_datang.toLocaleString() + '</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akap.penumpang_datang.toLocaleString() + '</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akap.bis_berangkat.toLocaleString() + '</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akap.penumpang_berangkat.toLocaleString() + '</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akdp.bis_datang.toLocaleString() + '</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akdp.penumpang_datang.toLocaleString() + '</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akdp.bis_berangkat.toLocaleString() + '</td>';
                        footerHtml += '<td class="text-center">' + response.totals.akdp.penumpang_berangkat.toLocaleString() + '</td>';
                        footerHtml += '</tr>';

                        $('#rekapTableFooter').html(footerHtml);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal memuat data rekap bulanan'
                        });
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memuat data'
                    });
                }
            });
        }

        $(document).on('click', '#btnExportPdfRekap', function() {
            var tahun = $('#tahun_rekap').val();

            Swal.fire({
                title: 'Export Rekap Bulanan ke PDF?',
                html: '<div style="text-align: left; padding: 10px;">' +
                    '<p style="margin: 5px 0;"><i class="fa fa-calendar" style="margin-right: 8px; color: #3085d6;"></i><strong>Tahun:</strong> ' + tahun + '</p>' +
                    '<p style="margin: 5px 0;"><i class="fa fa-file-pdf-o" style="margin-right: 8px; color: #d33;"></i><strong>Format:</strong> PDF Landscape A4</p>' +
                    '</div>',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fa fa-download"></i> Ya, Download PDF',
                cancelButtonText: '<i class="fa fa-times"></i> Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: '<i class="fa fa-cog fa-spin"></i> Memproses...',
                        html: 'Sedang membuat file PDF<br><small>Mohon tunggu sebentar...</small>',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false
                    });

                    var form = $('<form>', {
                        'method': 'POST',
                        'action': '{{ route("dataproduksi.export.rekap.pdf") }}',
                        'target': '_blank'
                    });

                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': '{{ csrf_token() }}'
                    }));

                    form.append($('<input>', {
                        'type': 'hidden',
                        'name': 'tahun',
                        'value': tahun
                    }));

                    $('body').append(form);
                    form.submit();

                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'File PDF sedang diunduh...',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        form.remove();
                    }, 1500);
                }
            });
        });

        // ==================== GRAFIK PRODUKSI FUNCTIONS ====================
        let myChart = null;

        $(document).on('change', '#jenis_grafik', function() {
            if ($(this).val() === 'bulanan') {
                $('#bulan_filter_grafik').hide();
            } else {
                $('#bulan_filter_grafik').show();
            }
        });

        $(document).on('click', '#btnLoadGrafik', function() {
            console.log('Button Load Grafik clicked');
            loadGrafik();
        });

        $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function(e) {
            if ($(e.target).attr('href') === '#tab-grafik' && !myChart) {
                loadGrafik();
            }
        });

        function loadGrafik() {
            var jenisGrafik = $('#jenis_grafik').val();
            var bulan = $('#bulan_grafik').val();
            var tahun = $('#tahun_grafik').val();
            console.log('loadGrafik called with jenis:', jenisGrafik, 'bulan:', bulan, 'tahun:', tahun);

            Swal.fire({
                title: 'Memuat Data...',
                html: 'Sedang memproses grafik',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '{{ route("dataproduksi.grafik.data") }}',
                method: 'GET',
                data: {
                    jenis: jenisGrafik,
                    bulan: bulan,
                    tahun: tahun
                },
                success: function(response) {
                    Swal.close();

                    if (response.success) {
                        if (myChart) {
                            myChart.destroy();
                        }

                        var ctx = document.getElementById('grafikProduksi').getContext('2d');
                        myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: response.labels,
                                datasets: response.datasets
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: jenisGrafik === 'bulanan' ?
                                            'Grafik Produksi Bulanan Tahun ' + tahun : 'Grafik Produksi Harian'
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });

                        updateStatistics(response.datasets);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal memuat data grafik'
                        });
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memuat data'
                    });
                }
            });
        }

        function updateStatistics(datasets) {
            var akapBis = datasets[0].data.reduce((a, b) => a + b, 0);
            var akapPnp = datasets[1].data.reduce((a, b) => a + b, 0);
            var akdpBis = datasets[2].data.reduce((a, b) => a + b, 0);
            var akdpPnp = datasets[3].data.reduce((a, b) => a + b, 0);

            $('#stat_akap_bis').text(akapBis.toLocaleString());
            $('#stat_akap_pnp').text(akapPnp.toLocaleString());
            $('#stat_akdp_bis').text(akdpBis.toLocaleString());
            $('#stat_akdp_pnp').text(akdpPnp.toLocaleString());
        }

        // ==================== PREVIEW EXPORT FUNCTIONS ====================
        $(document).on('click', '#btnPreview', function() {
            var bulan = $('#bulan_export').val();
            var tahun = $('#tahun_export').val();
            var jenis_trayek = $('#jenis_trayek_export').val();
            var provinsi = $('#provinsi_export').val();
            var kabupaten = $('#kabupaten_export').val();
            var terminal_tujuan = $('#terminal_tujuan_export').val();

            if (!bulan || !tahun) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Silakan pilih bulan dan tahun terlebih dahulu'
                });
                return;
            }

            $('#previewContainer').show();
            $('#previewLoading').show();
            $('#previewContent').hide();

            $.ajax({
                url: '{{ route("dataproduksi.preview") }}',
                method: 'GET',
                data: {
                    bulan: bulan,
                    tahun: tahun,
                    jenis_trayek: jenis_trayek,
                    provinsi: provinsi,
                    kabupaten: kabupaten,
                    terminal_tujuan: terminal_tujuan
                },
                success: function(response) {
                    $('#previewLoading').hide();

                    if (response.success) {
                        $('#previewTotal').text(response.total);

                        var tbody = $('#previewTableBody');
                        tbody.empty();

                        if (response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                var row = '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + item.no_kendaraan + '</td>' +
                                    '<td>' + (item.nama_po || '-') + '</td>' +
                                    '<td>' + (item.provinsi || '-') + '</td>' +
                                    '<td>' + (item.kabupaten || '-') + '</td>' +
                                    '<td>' + (item.terminal_tujuan || '-') + '</td>' +
                                    '<td>' + item.tanggal + '</td>' +
                                    '</tr>';
                                tbody.append(row);
                            });
                        } else {
                            tbody.append('<tr><td colspan="7" class="text-center">Tidak ada data</td></tr>');
                        }

                        $('#previewContent').show();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal memuat preview data'
                        });
                    }
                },
                error: function() {
                    $('#previewLoading').hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memuat preview'
                    });
                }
            });
        });

        // Reset preview saat modal ditutup
        $('#modalExport').on('hidden.bs.modal', function() {
            $('#previewContainer').hide();
            $('#previewContent').hide();
            $('#previewTableBody').empty();
        });

        // ==================== PREVIEW EXPORT PDF FUNCTIONS ====================
        $(document).on('click', '#btnPreviewPdf', function() {
            var bulan = $('#bulan_pdf').val();
            var tahun = $('#tahun_pdf').val();
            var jenis_trayek = $('#jenis_trayek_pdf').val();
            var provinsi = $('#provinsi_pdf').val();
            var kabupaten = $('#kabupaten_pdf').val();
            var terminal_tujuan = $('#terminal_tujuan_pdf').val();

            if (!bulan || !tahun) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Silakan pilih bulan dan tahun terlebih dahulu'
                });
                return;
            }

            $('#previewContainerPdf').show();
            $('#previewLoadingPdf').show();
            $('#previewContentPdf').hide();

            $.ajax({
                url: '{{ route("dataproduksi.preview") }}',
                method: 'GET',
                data: {
                    bulan: bulan,
                    tahun: tahun,
                    jenis_trayek: jenis_trayek,
                    provinsi: provinsi,
                    kabupaten: kabupaten,
                    terminal_tujuan: terminal_tujuan
                },
                success: function(response) {
                    $('#previewLoadingPdf').hide();

                    if (response.success) {
                        $('#previewTotalPdf').text(response.total);

                        var tbody = $('#previewTableBodyPdf');
                        tbody.empty();

                        if (response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                var row = '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + item.no_kendaraan + '</td>' +
                                    '<td>' + (item.nama_po || '-') + '</td>' +
                                    '<td>' + (item.provinsi || '-') + '</td>' +
                                    '<td>' + (item.kabupaten || '-') + '</td>' +
                                    '<td>' + (item.terminal_tujuan || '-') + '</td>' +
                                    '<td>' + item.tanggal + '</td>' +
                                    '</tr>';
                                tbody.append(row);
                            });
                        } else {
                            tbody.append('<tr><td colspan="7" class="text-center">Tidak ada data</td></tr>');
                        }

                        $('#previewContentPdf').show();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal memuat preview data'
                        });
                    }
                },
                error: function() {
                    $('#previewLoadingPdf').hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memuat preview'
                    });
                }
            });
        });

        // Reset preview PDF saat modal ditutup
        $('#modalExportPdf').on('hidden.bs.modal', function() {
            $('#previewContainerPdf').hide();
            $('#previewContentPdf').hide();
            $('#previewTableBodyPdf').empty();
        });
    })
</script>

@endsection