@extends('landing_page.layouts.main')

@section('content')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title text-warning mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Struktur Organisasi</h1>
                <!-- <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-warning">About</li>
                </ol>     -->
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center mb-5">
                        <h5 class="sub-title text-primary">Struktur Organisasi</h5>
                        <h1 class="display-5 mb-4">Terminal Tipe A Bangga Mbangun Desa Cilacap</h1>
                    </div>
                </div>

                <div class="col-lg-10 col-xl-8 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="mb-4">
                        <img src="{{ asset('assets/img/struktur_organisasi.png') }}" class="img-fluid rounded shadow" alt="x">
                    </div>

                    <div class="bg-light rounded p-4">
                        <p class="mb-0 text-justify">
                            Berdasarkan Peraturan Menteri Perhubungan Republik Indonesia Nomor PM 1 Tahun 2025 Tentang Perubahan Kedua atas Peraturan Menteri Perhubungan Nomor PM 6 Tahun 2023 tentang Organisasi dan Tata Kerja Balai Pengelola Transportasi Darat. Berikut adalah Struktur Organisasi Balai Pengelola Transportasi Darat Kelas I Jawa Tengah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
</body>

</html>
@endsection