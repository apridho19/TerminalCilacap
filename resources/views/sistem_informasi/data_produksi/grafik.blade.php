@extends('sistem_informasi.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Grafik Data Produksi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Data Produksi</li>
                <li class="breadcrumb-item">Grafik</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <!-- Filter Card -->
            <div class="ibox">
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
                        <div class="col-md-3" id="bulan_filter">
                            <div class="form-group">
                                <label for="bulan" class="font-strong">Pilih Bulan:</label>
                                <select class="form-control" id="bulan">
                                    @for($m = 1; $m <= 12; $m++)
                                        <option value="{{ $m }}" {{ $m == $bulan ? 'selected' : '' }}>
                                        {{ ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'][$m] }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun" class="font-strong">Pilih Tahun:</label>
                                <select class="form-control" id="tahun">
                                    @for($year = date('Y'); $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
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
                <!-- Line Chart -->
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
        <!-- END PAGE CONTENT-->
    </div>
</div>

<script>
    let myChart = null;

    $(function() {
        // Load grafik pertama kali
        loadGrafik();

        // Toggle bulan filter berdasarkan jenis grafik
        $('#jenis_grafik').on('change', function() {
            if ($(this).val() === 'bulanan') {
                $('#bulan_filter').hide();
            } else {
                $('#bulan_filter').show();
            }
        });

        // Load grafik button
        $('#btnLoadGrafik').on('click', function() {
            loadGrafik();
        });

        function loadGrafik() {
            var jenisGrafik = $('#jenis_grafik').val();
            var bulan = $('#bulan').val();
            var tahun = $('#tahun').val();

            // Show loading
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
                        // Destroy existing chart
                        if (myChart) {
                            myChart.destroy();
                        }

                        // Create new chart
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

                        // Update statistics
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
    });
</script>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

@endsection