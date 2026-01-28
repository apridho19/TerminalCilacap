@extends('sistem_informasi.layouts.main')

@section('content')

<body class="fixed-navbar">
    <div class="page-wrapper">
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Rekap Bulanan Data Produksi</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Produksi</li>
                    <li class="breadcrumb-item">Rekap Bulanan</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Rekap Bulanan - Tahun {{ $tahun }}</div>
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
                                <label for="tahun" class="font-strong">Pilih Tahun:</label>
                                <select class="form-control" id="tahun" name="tahun">
                                    @for($year = date('Y'); $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
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
                        <div class="table-responsive">
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
                                <tbody>
                                    @php
                                    $bulanNama = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    @endphp
                                    @foreach($rekapData as $item)
                                    <tr>
                                        <td class="font-strong">{{ $bulanNama[$item['bulan']] }}</td>
                                        <!-- AKAP -->
                                        <td class="text-center">{{ number_format($item['akap']['bis_datang']) }}</td>
                                        <td class="text-center">{{ number_format($item['akap']['penumpang_datang']) }}</td>
                                        <td class="text-center">{{ number_format($item['akap']['bis_berangkat']) }}</td>
                                        <td class="text-center">{{ number_format($item['akap']['penumpang_berangkat']) }}</td>
                                        <!-- AKDP -->
                                        <td class="text-center">{{ number_format($item['akdp']['bis_datang']) }}</td>
                                        <td class="text-center">{{ number_format($item['akdp']['penumpang_datang']) }}</td>
                                        <td class="text-center">{{ number_format($item['akdp']['bis_berangkat']) }}</td>
                                        <td class="text-center">{{ number_format($item['akdp']['penumpang_berangkat']) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-dark text-white font-strong">
                                        <td class="text-center">TOTAL</td>
                                        <!-- AKAP -->
                                        <td class="text-center">{{ number_format($totals['akap']['bis_datang']) }}</td>
                                        <td class="text-center">{{ number_format($totals['akap']['penumpang_datang']) }}</td>
                                        <td class="text-center">{{ number_format($totals['akap']['bis_berangkat']) }}</td>
                                        <td class="text-center">{{ number_format($totals['akap']['penumpang_berangkat']) }}</td>
                                        <!-- AKDP -->
                                        <td class="text-center">{{ number_format($totals['akdp']['bis_datang']) }}</td>
                                        <td class="text-center">{{ number_format($totals['akdp']['penumpang_datang']) }}</td>
                                        <td class="text-center">{{ number_format($totals['akdp']['bis_berangkat']) }}</td>
                                        <td class="text-center">{{ number_format($totals['akdp']['penumpang_berangkat']) }}</td>
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
            <!-- END PAGE CONTENT-->
        </div>
    </div>

    <script>
        $(function() {
            // Load Data Button Handler
            $('#btnLoadRekap').on('click', function() {
                var tahun = $('#tahun').val();
                window.location.href = '{{ route("dataproduksi.rekap.bulanan") }}?tahun=' + tahun;
            });

            // Export PDF Handler
            $('#btnExportPdfRekap').on('click', function() {
                var tahun = $('#tahun').val();

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
        });
    </script>
</body>

@endsection