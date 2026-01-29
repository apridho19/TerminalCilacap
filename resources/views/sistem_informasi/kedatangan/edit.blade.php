@extends('sistem_informasi.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Edit Data Kedatangan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('kedatangan.index') }}">Data Kedatangan</a>
                </li>
                <li class="breadcrumb-item">Edit Data</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Form Edit Data Kedatangan</div>
                </div>
                <div class="ibox-body">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Terdapat kesalahan dalam pengisian form:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="{{ route('kedatangan.update', $dataProduksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="data_master_id" name="data_master_id" value="{{ old('data_master_id', $dataProduksi->data_master_id) }}">

                        <div class="form-group">
                            <label for="no_kendaraan">Nomor Kendaraan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-uppercase @error('no_kendaraan') is-invalid @enderror"
                                id="no_kendaraan" name="no_kendaraan"
                                value="{{ old('no_kendaraan', $dataProduksi->no_kendaraan) }}" required>
                            <small id="info_kendaraan" class="form-text text-muted"></small>
                            @error('no_kendaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama PO</label>
                                    <input type="text" class="form-control" id="display_nama_po" readonly style="background-color: #e9ecef;" value="{{ $dataProduksi->dataMaster->nama_po ?? '-' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Trayek</label>
                                    <input type="text" class="form-control" id="display_jenis_trayek" readonly style="background-color: #e9ecef;" value="{{ $dataProduksi->dataMaster->jenis_trayek ?? '-' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Trayek</label>
                            <input type="text" class="form-control" id="display_trayek" readonly style="background-color: #e9ecef;" value="{{ $dataProduksi->dataMaster->data_trayek ?? '-' }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asal - Tujuan</label>
                                    <input type="text" class="form-control" id="display_asal_tujuan" readonly style="background-color: #e9ecef;" value="{{ $dataProduksi->dataMaster->asal_tujuan ?? '-' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" id="display_provinsi" readonly style="background-color: #e9ecef;" value="{{ $dataProduksi->dataMaster->provinsi ?? '-' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Terminal Tujuan</label>
                                    <input type="text" class="form-control" id="display_terminal_tujuan" readonly style="background-color: #e9ecef;" value="{{ $dataProduksi->dataMaster->terminal_tujuan ?? '-' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input type="text" class="form-control" id="display_kabupaten" readonly style="background-color: #e9ecef;" value="{{ $dataProduksi->dataMaster->kabupaten ?? '-' }}">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-group">
                            <label for="jml_pnp_datang">Jumlah Penumpang Datang <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('jml_pnp_datang') is-invalid @enderror"
                                id="jml_pnp_datang" name="jml_pnp_datang"
                                value="{{ old('jml_pnp_datang', $dataProduksi->jml_pnp_datang) }}" min="0" required>
                            @error('jml_pnp_datang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="waktu_datang">Waktu Datang <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('waktu_datang') is-invalid @enderror"
                                id="waktu_datang" name="waktu_datang"
                                value="{{ old('waktu_datang', $dataProduksi->waktu_datang ? \Carbon\Carbon::parse($dataProduksi->waktu_datang)->format('H:i') : '') }}" step="60" required>
                            @error('waktu_datang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a href="{{ route('kedatangan.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>

<!-- CORE PLUGINS -->
<script src="{{ asset('./assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('./assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('./assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('./assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>

<script>
    $(function() {
        // Auto detect data master berdasarkan no_kendaraan
        let typingTimer;
        const doneTypingInterval = 500;

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

                        $('#display_nama_po').val('');
                        $('#display_jenis_trayek').val('');
                        $('#display_trayek').val('');
                        $('#display_asal_tujuan').val('');
                        $('#display_provinsi').val('');
                        $('#display_terminal_tujuan').val('');
                        $('#display_kabupaten').val('');
                    }
                }
            });
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