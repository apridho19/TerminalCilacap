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
    <div class="container-fluid service overflow-hidden py-5">
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
                            src="img/layout_fasilitas.jpg"
                            class="img-fluid w-100 rounded shadow-lg"
                            alt="Layout Fasilitas Terminal BMD Cilacap" />
                        <h4 class="mt-4 mb-4 text-primary">
                            Layout Terminal TTA BMD Cilacap
                        </h4>
                    </div>
                </div>
            </div>
            <!-- Facility Descriptions -->
            <div class="row g-4 justify-content-center">
                <div class="col-lg-12">
                    <div class="facility-legends">
                        <h3 class="text-center mb-4 text-primary">Keterangan Fasilitas</h3>
                        <div class="row g-3">
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">A</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Gedung Utama</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">B</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Kantin</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">C</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Pintu Kedatangan</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">D</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Ruang Tunggu (Lantai 1)</strong><br>
                                        <small class="text-muted">MPP (Lantai 2)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">E</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Mushola</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">F</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Parkir Keberangkatan</strong><br>
                                        <small class="text-muted">Bus AKDP</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">G</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Parkir Keberangkatan</strong><br>
                                        <small class="text-muted">Bus AKAP</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">H</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Parkir Utara</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">I</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Parkir Angkutan Kota</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="facility-item d-flex align-items-center p-3 bg-light rounded">
                                    <div class="facility-letter me-3">
                                        <span class="badge bg-primary fs-5 px-3 py-2">J</span>
                                    </div>
                                    <div class="facility-desc">
                                        <strong>Parkir Kendaraan Pribadi</strong><br>
                                        <small class="text-muted">Pengantar</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Layout Fasilitas End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


</body>
@endsection