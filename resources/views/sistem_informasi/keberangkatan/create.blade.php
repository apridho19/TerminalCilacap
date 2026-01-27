@extends('sistem_informasi.layouts.main')

@section('content')

<div class="container">
    <h1 class="mb-4">Tambah Data Keberangkatan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('keberangkatan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="no_kendaraan" class="form-label">No Kendaraan</label>
            <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" required>
        </div>
        <div class="mb-3">
            <label for="jml_pnp_berangkat" class="form-label">Jumlah Penumpang Berangkat</label>
            <input type="number" class="form-control" id="jml_pnp_berangkat" name="jml_pnp_berangkat" required>
        </div>
        <div class="mb-3">
            <label for="waktu_berangkat" class="form-label">Waktu Berangkat</label>
            <input type="time" class="form-control" id="waktu_berangkat" name="waktu_berangkat" required>
        </div>
        <div class="mb-3">
            <label for="bus_berangkat" class="form-label">Bus Berangkat</label>
            <input type="datetime-local" class="form-control" id="bus_berangkat" name="bus_berangkat" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection