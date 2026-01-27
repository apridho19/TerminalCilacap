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
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Produksi</li>
                    <li class="breadcrumb-item">Rekap Bulanan</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Rekap Bulanan - Tahun {{ $tahun }}</div>
                    </div>
                    <div class="ibox-body">
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i>
                            Fitur Rekap Bulanan sedang dalam pengembangan.
                        </div>

                        <div class="form-group">
                            <label for="tahun">Pilih Tahun:</label>
                            <form action="{{ route('dataproduksi.rekap.bulanan') }}" method="GET" class="form-inline">
                                <select class="form-control mr-2" name="tahun" id="tahun">
                                    @for($year = date('Y'); $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Tampilkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
</body>

@endsection