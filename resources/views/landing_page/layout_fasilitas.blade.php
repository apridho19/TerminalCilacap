@extends('landing_page.layouts.main')

@section('content')

<body>
    <!-- Spinner Start -->
    <div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div
            class="spinner-border text-warning"
            style="width: 3rem; height: 3rem"
            role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Modal Search Start -->
    <div
        class="modal fade"
        id="searchModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title text-warning mb-0" id="exampleModalLabel">
                        Search by keyword
                    </h4>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input
                            type="search"
                            class="form-control p-3"
                            placeholder="keywords"
                            aria-describedby="search-icon-1" />
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
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Fasilitas</h1>
                <!-- <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-warning">About</li>
                </ol>     -->
        </div>
    </div>
    <!-- Header End -->


    <!-- Layout Fasilitas Start -->
    <div class="container-fluid training overflow-hidden bg-light py-5">
        <div class="container py-5">
            <div
                class="section-title text-center mb-5 wow fadeInUp"
                data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Layout Terminal</h5>
                </div>
                <h1 class="display-5 mb-4">
                    Denah Fasilitas Terminal TTA BMD Cilacap
                </h1>
                <p class="mb-0">
                    Berikut adalah denah lengkap fasilitas Terminal Tipe A Bangga
                    Mbangun Desa (BMD) Cilacap beserta keterangan setiap area dan
                    fasilitas yang tersedia.
                </p>
            </div>

            <!-- Layout Image Section -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 col-xl-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center">

                        <img
                            src="{{ asset('assets/img/layout-fasilitas.png') }}"
                            class="img-fluid w-100 rounded shadow-lg"
                            alt="Layout Fasilitas Terminal BMD Cilacap" />
                        <h4 class="mt-4 mb-4 text-primary">
                            Layout Terminal TTA BMD Cilacap
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Layout Fasilitas End -->

    <!-- Training Start -->
    <div class="container-fluid training overflow-hidden bg-light py-5">
        <div class="container py-5">
            <div class="row g-3">
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.1s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/gedung_depan.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Gedung</a>
                                <a href="#" class="h4 text-white mb-0">Utama</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">A</span>Gedung Utama</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.3s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/service-1.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Kantin</a>
                                <a href="#" class="h4 text-white mb-0">Terminal</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">B</span>Kantin Terminal</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.5s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/pintu_masuk_terminal.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Pintu</a>
                                <a href="#" class="h4 text-white mb-0">Kedatangan</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">C</span>Pintu Kedatangan</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.7s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/training-1.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Ruang</a>
                                <a href="#" class="h4 text-white mb-0">Tunggu</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">D</span>Ruang Tunggu Keberangkatan</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.1s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/service-2.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Mushola</a>
                                <a href="#" class="h4 text-white mb-0">Terminal</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">E</span>Masjid</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.3s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/terminal-bus-cilacap-1.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Parkir</a>
                                <a href="#" class="h4 text-white mb-0">AKDP</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">F</span>Parkir Keberangkatan AKDP</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.5s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/terminal-bus-cilacap-2.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Parkir</a>
                                <a href="#" class="h4 text-white mb-0">AKAP</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">G</span>Parkir Keberangkatan AKAP</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-xl-4 wow fadeInUp"
                    data-wow-delay="0.7s">
                    <div class="training-item h-100 rounded shadow-sm">
                        <div class="training-inner">
                            <img
                                src="{{ asset('assets/img/terminal-bus-cilacap.jpg') }}"
                                class="img-fluid w-100 rounded-top"
                                alt="Image"
                                style="height: 250px; object-fit: cover;" />
                            <div class="training-title-name">
                                <a href="#" class="h4 text-white mb-0">Area</a>
                                <a href="#" class="h4 text-white mb-0">Parkir</a>
                            </div>
                        </div>
                        <div class="training-content rounded-bottom p-4 bg-dark">
                            <a href="#">
                                <h5 class="text-white mb-3"><span class="badge bg-primary me-2">H</span>Tempat Perlengkapan</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a
                        class="btn btn-primary border-warning rounded-pill py-3 px-5 wow fadeInUp"
                        data-wow-delay="0.1s"
                        href="{{ url('/') }}">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Training End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


</body>
@endsection