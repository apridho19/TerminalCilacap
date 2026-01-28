@extends('sistem_informasi.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Data Keberangkatan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Data Keberangkatan</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Keberangkatan</div>
                </div>
                <div class="ibox-body">
                    <div class="mb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKeberangkatan">
                            <i class="fa fa-plus"></i> Tambah Data Keberangkatan
                        </button>
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

                    <table id="example-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama PO</th>
                                <th class="text-center">No Kendaraan</th>
                                <th class="text-center">Asal - Tujuan</th>
                                <th class="text-center">Jumlah Penumpang</th>
                                <th class="text-center">Waktu Berangkat</th>
                                <th class="text-center">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataProduksi as $index => $produksi)
                            <tr>
                                <td class="text-center">{{ ($dataProduksi->currentPage() - 1) * $dataProduksi->perPage() + $loop->iteration }}</td>
                                <td>{{ $produksi->dataMaster->nama_po ?? '-' }}</td>
                                <td class="text-center">{{ $produksi->no_kendaraan }}</td>
                                <td>{{ $produksi->dataMaster->asal_tujuan ?? '-' }}</td>
                                <td class="text-center">{{ $produksi->jml_pnp_berangkat }}</td>
                                <td class="text-center">{{ $produksi->waktu_berangkat ? \Carbon\Carbon::parse($produksi->waktu_berangkat)->format('H:i') : '-' }}</td>
                                <td class="text-center">{{ $produksi->bus_berangkat ? \Carbon\Carbon::parse($produksi->bus_berangkat)->format('d-m-Y') : '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            Menampilkan {{ $dataProduksi->firstItem() ?? 0 }} sampai {{ $dataProduksi->lastItem() ?? 0 }} dari {{ $dataProduksi->total() }} data
                        </div>
                        <div>
                            {{ $dataProduksi->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>

<!-- Modal Tambah Data Keberangkatan -->
<div class="modal fade" id="modalTambahKeberangkatan" tabindex="-1" role="dialog" aria-labelledby="modalTambahKeberangkatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahKeberangkatanLabel">
                    <i class="fa fa-plus-circle"></i> Tambah Data Keberangkatan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('keberangkatan.store') }}" method="POST" id="formTambahKeberangkatan">
                @csrf
                <input type="hidden" id="data_master_id" name="data_master_id" value="{{ old('data_master_id') }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no_kendaraan" class="font-strong">Nomor Kendaraan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-uppercase" id="no_kendaraan" name="no_kendaraan" placeholder="Masukkan nomor kendaraan" value="{{ old('no_kendaraan') }}" required>
                        <small id="info_kendaraan" class="form-text text-muted"></small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_nama_po" class="font-strong">Nama PO</label>
                                <input type="text" class="form-control" id="display_nama_po" readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_jenis_trayek" class="font-strong">Jenis Trayek</label>
                                <input type="text" class="form-control" id="display_jenis_trayek" readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="display_trayek" class="font-strong">Trayek</label>
                        <input type="text" class="form-control" id="display_trayek" readonly style="background-color: #e9ecef;">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_asal_tujuan" class="font-strong">Asal - Tujuan</label>
                                <input type="text" class="form-control" id="display_asal_tujuan" readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_provinsi" class="font-strong">Provinsi</label>
                                <input type="text" class="form-control" id="display_provinsi" readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_terminal_tujuan" class="font-strong">Terminal Tujuan</label>
                                <input type="text" class="form-control" id="display_terminal_tujuan" readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="display_kabupaten" class="font-strong">Kabupaten</label>
                                <input type="text" class="form-control" id="display_kabupaten" readonly style="background-color: #e9ecef;">
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-group">
                        <label for="jml_pnp_berangkat" class="font-strong">Jumlah Penumpang Berangkat <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="jml_pnp_berangkat" name="jml_pnp_berangkat" placeholder="Masukkan jumlah penumpang" value="{{ old('jml_pnp_berangkat') }}" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_berangkat" class="font-strong">Waktu Berangkat <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" id="waktu_berangkat" name="waktu_berangkat" value="{{ old('waktu_berangkat') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Data
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
</style>

<!-- CORE PLUGINS-->
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    $(function() {
        // DataTables dinonaktifkan karena menggunakan Laravel pagination
        // $('#example-table').DataTable({
        //     pageLength: 10,
        // });

        // Jika ada error validasi, buka modal kembali
        @if($errors - > any())
        $('#modalTambahKeberangkatan').modal('show');
        @endif

        // Auto hide alert setelah 5 detik
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Auto detect data master berdasarkan no_kendaraan
        let typingTimer;
        const doneTypingInterval = 500; // 0.5 detik setelah user berhenti mengetik

        $('#no_kendaraan').on('keyup', function() {
            clearTimeout(typingTimer);
            const noKendaraan = $(this).val().trim();

            if (noKendaraan.length > 0) {
                typingTimer = setTimeout(function() {
                    checkKendaraan(noKendaraan);
                }, doneTypingInterval);
            } else {
                $('#info_kendaraan').html('').removeClass('text-success text-danger');
                $('#data_master_id').val('');
            }
        });

        $('#no_kendaraan').on('keydown', function() {
            clearTimeout(typingTimer);
        });

        function checkKendaraan(noKendaraan) {
            $.ajax({
                url: '/api/check-kendaraan/' + encodeURIComponent(noKendaraan),
                type: 'GET',
                success: function(response) {
                    if (response.found) {
                        $('#data_master_id').val(response.data.id);
                        $('#info_kendaraan')
                            .html('<i class="fa fa-check-circle"></i> Kendaraan ditemukan')
                            .removeClass('text-danger')
                            .addClass('text-success');

                        // Auto-fill semua field data master
                        $('#display_nama_po').val(response.data.nama_po || '-');
                        $('#display_jenis_trayek').val(response.data.jenis_trayek || '-');
                        $('#display_trayek').val(response.data.data_trayek || '-');
                        $('#display_asal_tujuan').val(response.data.asal_tujuan || '-');
                        $('#display_provinsi').val(response.data.provinsi || '-');
                        $('#display_terminal_tujuan').val(response.data.terminal_tujuan || '-');
                        $('#display_kabupaten').val(response.data.kabupaten || '-');
                    } else {
                        $('#data_master_id').val('');
                        $('#info_kendaraan')
                            .html('<i class="fa fa-exclamation-triangle"></i> ' + response.message)
                            .removeClass('text-success')
                            .addClass('text-danger');

                        // Clear semua field
                        $('#display_nama_po').val('');
                        $('#display_jenis_trayek').val('');
                        $('#display_trayek').val('');
                        $('#display_asal_tujuan').val('');
                        $('#display_provinsi').val('');
                        $('#display_terminal_tujuan').val('');
                        $('#display_kabupaten').val('');
                    }
                },
                error: function() {
                    $('#data_master_id').val('');
                    $('#info_kendaraan')
                        .html('<i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan saat memeriksa data')
                        .removeClass('text-success')
                        .addClass('text-danger');

                    // Clear semua field
                    $('#display_nama_po').val('');
                    $('#display_jenis_trayek').val('');
                    $('#display_trayek').val('');
                    $('#display_asal_tujuan').val('');
                    $('#display_provinsi').val('');
                    $('#display_terminal_tujuan').val('');
                    $('#display_kabupaten').val('');
                }
            });
        }

        // Reset form saat modal ditutup
        $('#modalTambahKeberangkatan').on('hidden.bs.modal', function() {
            $('#formTambahKeberangkatan')[0].reset();
            $('#info_kendaraan').html('').removeClass('text-success text-danger');
            $('#data_master_id').val('');
            $('#display_nama_po').val('');
            $('#display_jenis_trayek').val('');
            $('#display_trayek').val('');
            $('#display_asal_tujuan').val('');
            $('#display_provinsi').val('');
            $('#display_terminal_tujuan').val('');
            $('#display_kabupaten').val('');
        });
    })
</script>
</body>

@endsection