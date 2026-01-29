@extends('sistem_informasi.layouts.main')

@section('content')

<div class="container">
    <h1 class="mb-4">Tambah Data Kedatangan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('kedatangan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="no_kendaraan" class="form-label">No Kendaraan</label>
            <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" required>
        </div>
        <div class="mb-3">
            <label for="jml_pnp_datang" class="form-label">Jumlah Penumpang Datang</label>
            <input type="number" class="form-control" id="jml_pnp_datang" name="jml_pnp_datang" required>
        </div>
        <div class="mb-3">
            <label for="waktu_datang" class="form-label">Waktu Datang</label>
            <input type="time" class="form-control" id="waktu_datang" name="waktu_datang" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->

@endsection