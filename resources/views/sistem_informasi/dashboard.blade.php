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
                    <!-- <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Latest Orders</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th width="91px">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="invoice.html">AT2584</a>
                                            </td>
                                            <td>@Jack</td>
                                            <td>$564.00</td>
                                            <td>
                                                <span class="badge badge-success">Shipped</span>
                                            </td>
                                            <td>10/07/2017</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice.html">AT2575</a>
                                            </td>
                                            <td>@Amalia</td>
                                            <td>$220.60</td>
                                            <td>
                                                <span class="badge badge-success">Shipped</span>
                                            </td>
                                            <td>10/07/2017</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice.html">AT1204</a>
                                            </td>
                                            <td>@Emma</td>
                                            <td>$760.00</td>
                                            <td>
                                                <span class="badge badge-default">Pending</span>
                                            </td>
                                            <td>10/07/2017</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice.html">AT7578</a>
                                            </td>
                                            <td>@James</td>
                                            <td>$87.60</td>
                                            <td>
                                                <span class="badge badge-warning">Expired</span>
                                            </td>
                                            <td>10/07/2017</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice.html">AT0158</a>
                                            </td>
                                            <td>@Ava</td>
                                            <td>$430.50</td>
                                            <td>
                                                <span class="badge badge-default">Pending</span>
                                            </td>
                                            <td>10/07/2017</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice.html">AT0127</a>
                                            </td>
                                            <td>@Noah</td>
                                            <td>$64.00</td>
                                            <td>
                                                <span class="badge badge-success">Shipped</span>
                                            </td>
                                            <td>10/07/2017</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
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

    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Fluid</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
            <div class="d-flex m-b-20">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked="">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-white"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                    <label>
                        <input type="radio" name="setting-theme" value="orange">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                    <label>
                        <input type="radio" name="setting-theme" value="pink">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                    <label>
                        <input type="radio" name="setting-theme" value="white">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                    <label>
                        <input type="radio" name="setting-theme" value="blue-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                    <label>
                        <input type="radio" name="setting-theme" value="green-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                    <label>
                        <input type="radio" name="setting-theme" value="purple-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                    <label>
                        <input type="radio" name="setting-theme" value="orange-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                    <label>
                        <input type="radio" name="setting-theme" value="pink-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->

    <!-- BEGIN PAGA BACKDROPS-->
    <!-- <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div> -->
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