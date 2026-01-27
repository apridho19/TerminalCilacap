@extends('sistem_informasi.layouts.main')

@section('content')

<body class="fixed-navbar">
    <div class="page-wrapper">
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Grafik Data Produksi</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Produksi</li>
                    <li class="breadcrumb-item">Grafik</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Grafik Data Produksi</div>
                    </div>
                    <div class="ibox-body">
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i>
                            Fitur Grafik sedang dalam pengembangan.
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('dataproduksi.grafik') }}" method="GET">
                                    <div class="form-group">
                                        <label for="bulan">Pilih Bulan:</label>
                                        <select class="form-control" name="bulan" id="bulan">
                                            <option value="1" {{ $bulan == 1 ? 'selected' : '' }}>Januari</option>
                                            <option value="2" {{ $bulan == 2 ? 'selected' : '' }}>Februari</option>
                                            <option value="3" {{ $bulan == 3 ? 'selected' : '' }}>Maret</option>
                                            <option value="4" {{ $bulan == 4 ? 'selected' : '' }}>April</option>
                                            <option value="5" {{ $bulan == 5 ? 'selected' : '' }}>Mei</option>
                                            <option value="6" {{ $bulan == 6 ? 'selected' : '' }}>Juni</option>
                                            <option value="7" {{ $bulan == 7 ? 'selected' : '' }}>Juli</option>
                                            <option value="8" {{ $bulan == 8 ? 'selected' : '' }}>Agustus</option>
                                            <option value="9" {{ $bulan == 9 ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ $bulan == 10 ? 'selected' : '' }}>Oktober</option>
                                            <option value="11" {{ $bulan == 11 ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ $bulan == 12 ? 'selected' : '' }}>Desember</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Pilih Tahun:</label>
                                        <select class="form-control" name="tahun" id="tahun">
                                            @for($year = date('Y'); $year >= 2020; $year--)
                                            <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Tampilkan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
</body>

@endsection