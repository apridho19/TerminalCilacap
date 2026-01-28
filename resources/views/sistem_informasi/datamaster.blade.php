@extends('sistem_informasi.layouts.main')

@section('content')



<body class="fixed-navbar">
    <div class="page-wrapper">

        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Data Master</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalImport">
                                <i class="fa fa-file-excel-o"></i> Import dari Excel
                            </button>
                            <button type="button" class="btn btn-danger ml-2" id="btnRemoveDuplicates">
                                <i class="fa fa-clone"></i> Hapus Data Duplikat
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

                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if(session('info'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <table id="example-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">No Kendaraan</th>
                                    <th class="text-center">Nama PO</th>
                                    <th class="text-center">Jenis Trayek</th>
                                    <th class="text-center">Asal Tujuan</th>
                                    <th class="text-center">Data Trayek</th>
                                    <th class="text-center">Provinsi</th>
                                    <th class="text-center">Terminal Tujuan</th>
                                    <th class="text-center">Kabupaten</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataMaster as $data)
                                <tr>
                                    <td>{{ ($dataMaster->currentPage() - 1) * $dataMaster->perPage() + $loop->iteration }}</td>
                                    <td>{{ $data->no_kendaraan }}</td>
                                    <td>{{ $data->nama_po }}</td>
                                    <td>{{ $data->jenis_trayek }}</td>
                                    <td>{{ $data->asal_tujuan }}</td>
                                    <td>{{ $data->data_trayek }}</td>
                                    <td>{{ $data->provinsi }}</td>
                                    <td>{{ $data->terminal_tujuan }}</td>
                                    <td>{{ $data->kabupaten }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                Menampilkan {{ $dataMaster->firstItem() ?? 0 }} sampai {{ $dataMaster->lastItem() ?? 0 }} dari {{ $dataMaster->total() }} data
                            </div>
                            <div>
                                {{ $dataMaster->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
         
        </div>
    </div>

    <!-- Modal Import Excel -->
    <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImportLabel">
                        <i class="fa fa-file-excel-o"></i> Import Data dari Excel
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('datamaster.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <strong>Format Excel yang diperlukan:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Baris pertama harus berisi header kolom</li>
                                <li><strong>Kolom wajib:</strong>
                                    <ul>
                                        <li><code>no_kendaraan</code> (atau <code>nomor_kendaraan</code>)</li>
                                        <li><code>nama_po</code></li>
                                        <li><code>jenis_trayek</code></li>
                                        <li><code>asal_tujuan</code></li>
                                        <li><code>data_trayek</code> (atau <code>trayek</code>)</li>
                                        <li><code>provinsi</code></li>
                                        <li><code>terminal_tujuan</code></li>
                                        <li><code>kabupaten</code></li>
                                    </ul>
                                </li>
                                <li>Format file: .xlsx, .xls, atau .csv</li>
                                <li>Maksimal ukuran: 2MB</li>
                                <li><strong>Header tidak case-sensitive</strong> (bisa pakai huruf besar/kecil)</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="file" class="font-strong">Pilih File Excel <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                            <small class="form-text text-muted">File Excel dengan data master kendaraan</small>
                        </div>

                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian:</strong> Nomor kendaraan yang sudah ada akan dilewati (tidak akan duplikat).
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

            // Auto hide alert setelah 5 detik
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        })

        $('#btnRemoveDuplicates').on('click', function() {
            Swal.fire({
                title: 'Hapus Data Duplikat?',
                html: '<div style="text-align: left; padding: 10px;">' +
                    '<p style="margin: 10px 0;"><i class="fa fa-info-circle" style="margin-right: 8px; color: #3085d6;"></i><strong>Kriteria:</strong> Berdasarkan No Kendaraan yang sama</p>' +
                    '<p style="margin: 10px 0;"><i class="fa fa-check-circle" style="margin-right: 8px; color: #28a745;"></i><strong>Dipertahankan:</strong> Data yang lebih lama (pertama kali input)</p>' +
                    '<p style="margin: 10px 0;"><i class="fa fa-trash" style="margin-right: 8px; color: #dc3545;"></i><strong>Dihapus:</strong> Data duplikat yang lebih baru</p>' +
                    '</div>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fa fa-trash"></i> Ya, Hapus Duplikat',
                cancelButtonText: '<i class="fa fa-times"></i> Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: '<i class="fa fa-cog fa-spin"></i> Memproses...',
                        html: 'Sedang mencari dan menghapus data duplikat<br><small>Mohon tunggu sebentar...</small>',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false
                    });
                    document.getElementById('removeDuplicatesForm').submit();
                }
            });
        });
    </script>

    <!-- Form untuk hapus duplicate (hidden) -->
    <form id="removeDuplicatesForm" action="{{ route('datamaster.remove.duplicates') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

@endsection