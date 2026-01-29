@extends('sistem_informasi.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Data Master</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Data Master</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Master</div>
                </div>
                <div class="ibox-body">
                    <div class="mb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                            <i class="fa fa-plus"></i> Tambah Data Master
                        </button>
                        <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#modalImport">
                            <i class="fa fa-file-excel-o"></i> Import dari Excel
                        </button>
                        <button type="button" class="btn btn-danger ml-2" id="btnRemoveDuplicates">
                            <i class="fa fa-clone"></i> Hapus Data Duplikat
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">No</th>
                                    <th class="text-center">No Kendaraan</th>
                                    <th class="text-center">Nama PO</th>
                                    <th class="text-center">Jenis Trayek</th>
                                    <th class="text-center">Asal Tujuan</th>
                                    <th class="text-center">Data Trayek</th>
                                    <th class="text-center">Provinsi</th>
                                    <th class="text-center">Terminal Tujuan</th>
                                    <th class="text-center">Kabupaten</th>
                                    <th class="text-center" width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataMaster as $data)
                                <tr>
                                    <td class="text-center">{{ ($dataMaster->currentPage() - 1) * $dataMaster->perPage() + $loop->iteration }}</td>
                                    <td>{{ $data->no_kendaraan }}</td>
                                    <td>{{ $data->nama_po }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $data->jenis_trayek == 'AKAP' ? 'primary' : 'success' }}">
                                            {{ $data->jenis_trayek }}
                                        </span>
                                    </td>
                                    <td>{{ $data->asal_tujuan }}</td>
                                    <td>{{ $data->data_trayek }}</td>
                                    <td>{{ $data->provinsi }}</td>
                                    <td>{{ $data->terminal_tujuan }}</td>
                                    <td>{{ $data->kabupaten }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('datamaster.edit', $data->id) }}"
                                            class="btn btn-warning btn-sm mr-1"
                                            title="Edit Data"
                                            style="min-width: 32px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete('{{ $data->id }}', '{{ $data->no_kendaraan }}')"
                                            data-toggle="tooltip"
                                            title="Hapus Data"
                                            style="min-width: 32px;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center py-4">
                                        <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Tidak ada data master yang tersedia</p>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">
                                            <i class="fa fa-plus"></i> Tambah Data
                                        </button>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    @if($dataMaster->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            Menampilkan {{ $dataMaster->firstItem() ?? 0 }} sampai {{ $dataMaster->lastItem() ?? 0 }} dari {{ $dataMaster->total() }} data
                        </div>
                        <div>
                            {{ $dataMaster->links() }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTambahLabel">
                    <i class="fa fa-plus-circle"></i> Tambah Data Master
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('datamaster.store') }}" method="POST" id="formTambah">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_kendaraan">No Kendaraan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_po">Nama PO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_po" name="nama_po" maxlength="100" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_trayek">Jenis Trayek <span class="text-danger">*</span></label>
                                <select class="form-control" id="jenis_trayek" name="jenis_trayek" required>
                                    <option value="">-- Pilih Jenis Trayek --</option>
                                    <option value="AKAP">AKAP</option>
                                    <option value="AKDP">AKDP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asal_tujuan">Asal Tujuan</label>
                                <input type="text" class="form-control" id="asal_tujuan" name="asal_tujuan" maxlength="100">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="data_trayek">Data Trayek</label>
                        <textarea class="form-control" id="data_trayek" name="data_trayek" rows="3" maxlength="255"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="terminal_tujuan">Terminal Tujuan</label>
                                <input type="text" class="form-control" id="terminal_tujuan" name="terminal_tujuan" maxlength="50">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="modalEditLabel">
                    <i class="fa fa-edit"></i> Edit Data Master
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_no_kendaraan">No Kendaraan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_no_kendaraan" name="no_kendaraan" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_nama_po">Nama PO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_nama_po" name="nama_po" maxlength="100" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_jenis_trayek">Jenis Trayek <span class="text-danger">*</span></label>
                                <select class="form-control" id="edit_jenis_trayek" name="jenis_trayek" required>
                                    <option value="">-- Pilih Jenis Trayek --</option>
                                    <option value="AKAP">AKAP</option>
                                    <option value="AKDP">AKDP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_asal_tujuan">Asal Tujuan</label>
                                <input type="text" class="form-control" id="edit_asal_tujuan" name="asal_tujuan" maxlength="100">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_data_trayek">Data Trayek</label>
                        <textarea class="form-control" id="edit_data_trayek" name="data_trayek" rows="3" maxlength="255"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edit_provinsi">Provinsi</label>
                                <input type="text" class="form-control" id="edit_provinsi" name="provinsi" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edit_kabupaten">Kabupaten</label>
                                <input type="text" class="form-control" id="edit_kabupaten" name="kabupaten" maxlength="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edit_terminal_tujuan">Terminal Tujuan</label>
                                <input type="text" class="form-control" id="edit_terminal_tujuan" name="terminal_tujuan" maxlength="50">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Import Excel -->
<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalImportLabel">
                    <i class="fa fa-file-excel-o"></i> Import Data dari Excel
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('datamaster.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> <strong>Petunjuk Import:</strong>
                        <ul class="mb-0 mt-2">
                            <li>File harus berformat Excel (.xlsx, .xls, atau .csv)</li>
                            <li>Maksimal ukuran file 2MB</li>
                            <li>Pastikan kolom sesuai format: No Kendaraan, Nama PO, Jenis Trayek, dll</li>
                            <li>Data duplikat akan otomatis dilewati</li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="file">Pilih File Excel <span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-upload"></i> Import Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Form untuk hapus data (hidden) -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<!-- Form untuk hapus duplicate (hidden) -->
<form id="removeDuplicatesForm" action="{{ route('datamaster.remove.duplicates') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Initialize tooltips (Bootstrap + jQuery)
        if (typeof $ !== 'undefined') {
            $('[data-toggle="tooltip"]').tooltip();
        }

        // SweetAlert messages
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

        @if(session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Informasi',
            text: @json(session('info')),
            showConfirmButton: true
        });
        @endif

        // Button hapus duplikat
        const btnRemoveDuplicates = document.getElementById('btnRemoveDuplicates');
        if (btnRemoveDuplicates) {
            btnRemoveDuplicates.addEventListener('click', function() {
                Swal.fire({
                    title: 'Hapus Data Duplikat?',
                    html: 'Sistem akan mencari dan menghapus data dengan <strong>No Kendaraan yang sama</strong>.<br><br>' +
                        '<small class="text-muted">Data terlama akan dipertahankan.</small><br>' +
                        '<small class="text-danger">Proses ini tidak dapat dibatalkan!</small>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fa fa-trash"></i> Ya, Hapus Duplikat',
                    cancelButtonText: '<i class="fa fa-times"></i> Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: '<i class="fa fa-cog fa-spin"></i> Memproses...',
                            html: 'Sedang mencari dan menghapus data duplikat...',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false
                        });
                        document.getElementById('removeDuplicatesForm').submit();
                    }
                });
            });
        }
    });

    // Function edit data (boleh di luar)
    function editData(
        id, no_kendaraan, nama_po, jenis_trayek,
        asal_tujuan, data_trayek, provinsi, terminal_tujuan, kabupaten
    ) {
        document.getElementById('formEdit').action = `/sistem-informasi/datamaster/${id}`;

        document.getElementById('edit_no_kendaraan').value = no_kendaraan || '';
        document.getElementById('edit_nama_po').value = nama_po || '';
        document.getElementById('edit_jenis_trayek').value = jenis_trayek || '';
        document.getElementById('edit_asal_tujuan').value = asal_tujuan || '';
        document.getElementById('edit_data_trayek').value = data_trayek || '';
        document.getElementById('edit_provinsi').value = provinsi || '';
        document.getElementById('edit_kabupaten').value = kabupaten || '';
        document.getElementById('edit_terminal_tujuan').value = terminal_tujuan || '';

        $('#modalEdit').modal('show');
    }

    // Function confirm delete
    function confirmDelete(id, noKendaraan) {
        Swal.fire({
            title: 'Hapus Data?',
            html: `Apakah Anda yakin ingin menghapus data:<br><strong>${noKendaraan}</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('deleteForm');
                form.action = `/sistem-informasi/datamaster/${id}`;
                form.submit();
            }
        });
    }
</script>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

@endsection