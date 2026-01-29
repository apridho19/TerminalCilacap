@extends('sistem_informasi.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Data Kedatangan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Data Kedatangan</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Kedatangan</div>
                </div>
                <div class="ibox-body">
                    <div class="mb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKedatangan">
                            <i class="fa fa-plus"></i> Tambah Data Kedatangan
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

                    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                        <table id="example-table" class="table table-striped table-bordered" style="width: 100%; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th class="text-center" style="min-width: 50px;">No</th>
                                    <th class="text-center" style="min-width: 150px;">Nama PO</th>
                                    <th class="text-center" style="min-width: 120px;">No Kendaraan</th>
                                    <th class="text-center" style="min-width: 200px;">Asal - Tujuan</th>
                                    <th class="text-center" style="min-width: 120px;">Jumlah Penumpang</th>
                                    <th class="text-center" style="min-width: 120px;">Waktu Datang</th>
                                    <th class="text-center" style="min-width: 120px;">Tanggal</th>
                                    <th class="text-center" style="min-width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataProduksi as $index => $produksi)
                                <tr>
                                    <td class="text-center">{{ ($dataProduksi->currentPage() - 1) * $dataProduksi->perPage() + $loop->iteration }}</td>
                                    <td>{{ $produksi->dataMaster->nama_po ?? '-' }}</td>
                                    <td class="text-center">{{ $produksi->no_kendaraan }}</td>
                                    <td>{{ $produksi->dataMaster->asal_tujuan ?? '-' }}</td>
                                    <td class="text-center">{{ $produksi->jml_pnp_datang }}</td>
                                    <td class="text-center">{{ $produksi->waktu_datang ? \Carbon\Carbon::parse($produksi->waktu_datang)->format('H:i') : '-' }}</td>
                                    <td class="text-center">{{ $produksi->bus_datang ? \Carbon\Carbon::parse($produksi->bus_datang)->format('d-m-Y') : '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('kedatangan.edit', $produksi->id) }}"
                                            class="btn btn-warning btn-sm mr-1"
                                            title="Edit Data"
                                            style="min-width: 32px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if(auth()->user()->role !== 'pegawai')
                                        <button type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete('{{ $produksi->id }}', '{{ $produksi->no_kendaraan }}')"
                                            title="Hapus Data"
                                            style="min-width: 32px;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Tidak ada data kedatangan yang tersedia</p>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahKedatangan">
                                            <i class="fa fa-plus"></i> Tambah Data
                                        </button>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

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

<!-- Modal Tambah Data Kedatangan -->
<div class="modal fade" id="modalTambahKedatangan" tabindex="-1" role="dialog" aria-labelledby="modalTambahKedatanganLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahKedatanganLabel">
                    <i class="fa fa-plus-circle"></i> Tambah Data Kedatangan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kedatangan.store') }}" method="POST" id="formTambahKedatangan">
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
                                <label for="nama_po" class="font-strong">Nama PO</label>
                                <input type="text" class="form-control" id="nama_po" name="nama_po" placeholder="Otomatis terisi" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_trayek" class="font-strong">Jenis Trayek</label>
                                <input type="text" class="form-control" id="jenis_trayek" name="jenis_trayek" placeholder="Otomatis terisi" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="data_trayek" class="font-strong">Trayek</label>
                        <input type="text" class="form-control" id="data_trayek" name="data_trayek" placeholder="Otomatis terisi" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asal_tujuan" class="font-strong">Asal - Tujuan</label>
                                <input type="text" class="form-control" id="asal_tujuan" name="asal_tujuan" placeholder="Otomatis terisi" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinsi" class="font-strong">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Otomatis terisi" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="terminal_tujuan" class="font-strong">Terminal Tujuan</label>
                                <input type="text" class="form-control" id="terminal_tujuan" name="terminal_tujuan" placeholder="Otomatis terisi" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kabupaten" class="font-strong">Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Otomatis terisi" readonly>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-group">
                        <label for="jml_pnp_datang" class="font-strong">Jumlah Penumpang Datang <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="jml_pnp_datang" name="jml_pnp_datang" placeholder="Masukkan jumlah penumpang" value="{{ old('jml_pnp_datang') }}" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_datang" class="font-strong">Waktu Datang <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" id="waktu_datang" name="waktu_datang" value="{{ old('waktu_datang') }}" step="60" required>
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

<!-- Form Delete (Hidden) -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

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
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    /* ===============================
   CONFIRM DELETE (GLOBAL)
================================ */
    function confirmDelete(id, noKendaraan) {
        Swal.fire({
            title: 'Hapus Data?',
            html: `Apakah Anda yakin ingin menghapus data:<br>
               <strong>${noKendaraan}</strong><br><br>
               <small class="text-muted">Data yang dihapus tidak dapat dikembalikan</small>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="fa fa-trash"></i> Ya, Hapus',
            cancelButtonText: '<i class="fa fa-times"></i> Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: '<i class="fa fa-cog fa-spin"></i> Menghapus...',
                    html: 'Sedang menghapus data...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false
                });

                const form = document.getElementById('deleteForm');
                form.action = `/kedatangan/${id}`;
                form.submit();
            }
        });
    }

    /* ===============================
       DOCUMENT READY
    ================================ */
    $(function() {

        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // SweetAlert Session
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: @json(session('success')),
            showConfirmButton: false,
            timer: 2000
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: @json(session('error')),
            showConfirmButton: true
        });
        @endif

        // Jika ada error validasi, buka modal
        @if($errors->any())
        ('#modalTambahKedatangan').modal('show');
        @endif

        // Auto hide alert
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Auto detect kendaraan
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
                resetKendaraanInfo();
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
                            .html('<i class="fa fa-check-circle"></i> Kendaraan ditemukan di data master')
                            .removeClass('text-danger text-warning')
                            .addClass('text-success');

                        $('#nama_po').val(response.data.nama_po || '');
                        $('#jenis_trayek').val(response.data.jenis_trayek || '');
                        $('#data_trayek').val(response.data.data_trayek || '');
                        $('#asal_tujuan').val(response.data.asal_tujuan || '');
                        $('#provinsi').val(response.data.provinsi || '');
                        $('#terminal_tujuan').val(response.data.terminal_tujuan || '');
                        $('#kabupaten').val(response.data.kabupaten || '');
                    } else {
                        resetKendaraanManual();
                    }
                },
                error: function() {
                    $('#info_kendaraan')
                        .html('<i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan saat memeriksa data')
                        .removeClass('text-success text-warning')
                        .addClass('text-danger');
                    resetKendaraanManual();
                }
            });
        }

        function resetKendaraanInfo() {
            $('#info_kendaraan').html('').removeClass('text-success text-danger text-warning');
            $('#data_master_id').val('');
        }

        function resetKendaraanManual() {
            $('#data_master_id').val('');
            $('#info_kendaraan')
                .html('<i class="fa fa-exclamation-triangle"></i> Kendaraan tidak ditemukan, silakan isi manual')
                .removeClass('text-success text-danger')
                .addClass('text-warning');

            $('#nama_po, #jenis_trayek, #data_trayek, #asal_tujuan, #provinsi, #terminal_tujuan, #kabupaten').val('');
        }

        // Reset modal
        $('#modalTambahKedatangan').on('hidden.bs.modal', function() {
            $('#formTambahKedatangan')[0].reset();
            resetKendaraanInfo();
        });

    });
</script>

@endsection