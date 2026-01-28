@extends('sistem_informasi.layouts.main')

@section('content')

<body class="fixed-navbar">
    <div class="page-wrapper">
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{ $keberangkatanHariIni }}</h2>
                                <div class="m-b-5">BUS BERANGKAT HARI INI</div><i class="fa fa-bus widget-stat-icon"></i>
                                <div><i class="fa fa-users m-r-5"></i><small>{{ $totalPenumpangBerangkat }} Penumpang</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{ $kedatanganHariIni }}</h2>
                                <div class="m-b-5">BUS DATANG HARI INI</div><i class="fa fa-bus widget-stat-icon"></i>
                                <div><i class="fa fa-users m-r-5"></i><small>{{ $totalPenumpangDatang }} Penumpang</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{ $totalKendaraan }}</h2>
                                <div class="m-b-5">TOTAL KENDARAAN</div><i class="ti-car widget-stat-icon"></i>
                                <div><i class="fa fa-database m-r-5"></i><small>Data Master</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{ $totalKeberangkatan + $totalKedatangan }}</h2>
                                <div class="m-b-5">TOTAL TRANSAKSI</div><i class="fa fa-bar-chart widget-stat-icon"></i>
                                <div><i class="fa fa-list m-r-5"></i><small>Data Produksi</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Keberangkatan Terbaru Hari Ini</div>
                            </div>
                            <div class="ibox-body">
                                @if($keberangkatanTerbaru->count() > 0)
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>No Kendaraan</th>
                                            <th>Nama PO</th>
                                            <th>Asal - Tujuan</th>
                                            <th class="text-center">Penumpang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($keberangkatanTerbaru as $keberangkatan)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($keberangkatan->waktu_berangkat)->format('H:i') }}</td>
                                            <td><span class="badge badge-primary">{{ $keberangkatan->no_kendaraan }}</span></td>
                                            <td>{{ $keberangkatan->dataMaster->nama_po ?? '-' }}</td>
                                            <td>{{ $keberangkatan->dataMaster->asal_tujuan ?? '-' }}</td>
                                            <td class="text-center">
                                                <span class="badge badge-success">
                                                    <i class="fa fa-users"></i> {{ $keberangkatan->jml_pnp_berangkat }} orang
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="text-center py-4">
                                    <i class="fa fa-info-circle fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data keberangkatan hari ini</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Kedatangan Terbaru Hari Ini</div>
                            </div>
                            <div class="ibox-body">
                                @if(count($kedatanganTerbaru) > 0)
                                <ul class="list-group list-group-full">
                                    @foreach($kedatanganTerbaru as $kedatangan)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="font-strong">{{ $kedatangan->no_kendaraan }}</div>
                                                <small class="text-muted">{{ $kedatangan->dataMaster->nama_po ?? '-' }}</small>
                                            </div>
                                            <div class="text-right">
                                                <div class="badge badge-info">{{ \Carbon\Carbon::parse($kedatangan->waktu_datang)->format('H:i') }}</div>
                                                <div><small><i class="fa fa-users"></i> {{ $kedatangan->jml_pnp_datang }} orang</small></div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <div class="text-center py-4">
                                    <i class="fa fa-info-circle fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data kedatangan hari ini</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Grafik Keberangkatan & Kedatangan (7 Hari Terakhir)</div>
                            </div>
                            <div class="ibox-body">
                                <canvas id="trafficChart" style="height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Distribusi Jenis Trayek</div>
                            </div>
                            <div class="ibox-body">
                                <canvas id="pieChart" style="height:300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }
                </style>

            </div>
            <!-- END PAGE CONTENT-->


        </div>
    </div>

    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        // Data dari controller
        var labels = @json($dataGrafik['labels']);
        var dataKeberangkatan = @json($dataGrafik['keberangkatan']);
        var dataKedatangan = @json($dataGrafik['kedatangan']);

        // Konfigurasi chart
        var ctx = document.getElementById('trafficChart').getContext('2d');
        var trafficChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Keberangkatan',
                    data: dataKeberangkatan,
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Kedatangan',
                    data: dataKedatangan,
                    borderColor: '#17a2b8',
                    backgroundColor: 'rgba(23, 162, 184, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Pie Chart - Jenis Trayek
        var pieData = @json($dataPieChart);
        var pieLabels = pieData.map(item => item.jenis_trayek || 'Tidak Ada');
        var pieValues = pieData.map(item => item.total);

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieValues,
                    backgroundColor: [
                        '#28a745',
                        '#17a2b8',
                        '#ffc107',
                        '#dc3545',
                        '#6f42c1',
                        '#fd7e14',
                        '#20c997'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.parsed || 0;
                                var total = context.dataset.data.reduce((a, b) => a + b, 0);
                                var percentage = ((value / total) * 100).toFixed(1);
                                return label + ': ' + value + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

@endsection