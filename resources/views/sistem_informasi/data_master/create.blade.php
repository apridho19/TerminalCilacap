@extends('sistem_informasi.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Tambah Data Master</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('datamaster.index') }}">Data Master</a>
                </li>
                <li class="breadcrumb-item">Tambah Data</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Form Tambah Data Master</div>
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

                    <form action="{{ route('datamaster.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_kendaraan">No Kendaraan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('no_kendaraan') is-invalid @enderror"
                                        id="no_kendaraan" name="no_kendaraan"
                                        value="{{ old('no_kendaraan') }}"
                                        maxlength="10" required>
                                    @error('no_kendaraan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_po">Nama PO <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_po') is-invalid @enderror"
                                        id="nama_po" name="nama_po"
                                        value="{{ old('nama_po') }}"
                                        maxlength="100" required>
                                    @error('nama_po')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_trayek">Jenis Trayek <span class="text-danger">*</span></label>
                                    <select class="form-control @error('jenis_trayek') is-invalid @enderror"
                                        id="jenis_trayek" name="jenis_trayek" required>
                                        <option value="">-- Pilih Jenis Trayek --</option>
                                        <option value="AKAP" {{ old('jenis_trayek') == 'AKAP' ? 'selected' : '' }}>AKAP</option>
                                        <option value="AKDP" {{ old('jenis_trayek') == 'AKDP' ? 'selected' : '' }}>AKDP</option>
                                    </select>
                                    @error('jenis_trayek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="asal_tujuan">Asal Tujuan</label>
                                    <input type="text" class="form-control @error('asal_tujuan') is-invalid @enderror"
                                        id="asal_tujuan" name="asal_tujuan"
                                        value="{{ old('asal_tujuan') }}"
                                        maxlength="100">
                                    @error('asal_tujuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="data_trayek">Data Trayek</label>
                            <textarea class="form-control @error('data_trayek') is-invalid @enderror"
                                id="data_trayek" name="data_trayek"
                                rows="3" maxlength="255">{{ old('data_trayek') }}</textarea>
                            @error('data_trayek')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                        id="provinsi" name="provinsi"
                                        value="{{ old('provinsi') }}"
                                        maxlength="50">
                                    @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                        id="kabupaten" name="kabupaten"
                                        value="{{ old('kabupaten') }}"
                                        maxlength="50">
                                    @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="terminal_tujuan">Terminal Tujuan</label>
                                    <input type="text" class="form-control @error('terminal_tujuan') is-invalid @enderror"
                                        id="terminal_tujuan" name="terminal_tujuan"
                                        value="{{ old('terminal_tujuan') }}"
                                        maxlength="50">
                                    @error('terminal_tujuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <a href="{{ route('datamaster.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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

@endsection