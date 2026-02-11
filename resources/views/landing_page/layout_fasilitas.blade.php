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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Fasilitas Terminal</h3>
            <p class="text-white-50 mb-0 wow fadeInDown" data-wow-delay="0.3s">
            </p>
        </div>
    </div>
    <!-- Header End -->

    <!-- Layout Fasilitas Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Layout Terminal</h5>
                </div>
                <h1 class="display-5 mb-4">Denah Fasilitas Terminal TTA BMD Cilacap</h1>
                <p class="mb-0 text-muted" style="max-width: 800px; margin: 0 auto;">
                    Berikut adalah denah lengkap fasilitas Terminal Tipe A Bangga Mbangun Desa (BMD) Cilacap
                    beserta keterangan setiap area dan fasilitas yang tersedia untuk kenyamanan penumpang.
                </p>
            </div>

            <!-- Layout Image Section -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 col-xl-9 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card border-0 shadow-lg layout-card">
                        <div class="card-body p-4">
                            <div class="layout-img-wrapper">
                                <img
                                    src="{{ asset('assets/img/layout-fasilitas.png') }}"
                                    class="img-fluid w-100 rounded layout-img"
                                    alt="Layout Fasilitas Terminal BMD Cilacap" />
                            </div>
                            <div class="text-center mt-4">
                                <h4 class="text-primary mb-2">Layout Terminal TTA BMD Cilacap</h4>
                                <p class="text-muted mb-0">Denah lengkap fasilitas yang tersedia di terminal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Layout Fasilitas End -->


    <!-- Fasilitas Detail Start -->
    <div class="container-fluid bg-white py-5">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Detail Fasilitas</h5>
                </div>
                <h1 class="display-5 mb-4">Fasilitas Yang Tersedia</h1>
            </div>

            <div class="row g-4">
                <!-- Gedung Utama -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/gedung_depan.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Gedung Utama"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Gedung Utama</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">A</span>
                                Gedung Utama
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Pusat operasional dan administrasi terminal
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Kantin Terminal -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/service-1.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Kantin Terminal"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Kantin Terminal</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">B</span>
                                Kantin Terminal
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Area kuliner untuk penumpang dan pengunjung
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pintu Kedatangan -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/pintu_masuk_terminal.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Pintu Kedatangan"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Pintu Kedatangan</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">C</span>
                                Pintu Kedatangan
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Akses masuk untuk penumpang yang tiba
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Ruang Tunggu -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/training-1.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Ruang Tunggu"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Ruang Tunggu</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">D</span>
                                Ruang Tunggu Keberangkatan
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Area nyaman untuk menunggu keberangkatan
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Masjid -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/service-2.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Masjid"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Masjid Terminal</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">E</span>
                                Masjid
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Tempat ibadah bagi penumpang muslim
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Parkir AKDP -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/terminal-bus-cilacap-1.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Parkir AKDP"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Parkir AKDP</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">F</span>
                                Parkir Keberangkatan AKDP
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Area parkir bus Antar Kota Dalam Provinsi
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Parkir AKAP -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/terminal-bus-cilacap-2.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Parkir AKAP"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Parkir AKAP</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">G</span>
                                Parkir Keberangkatan AKAP
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Area parkir bus Antar Kota Antar Provinsi
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tempat Perlengkapan -->
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden facility-card">
                        <div class="position-relative facility-img-wrapper">
                            <img
                                src="{{ asset('assets/img/terminal-bus-cilacap.jpg') }}"
                                class="card-img-top facility-img"
                                alt="Area Parkir"
                                style="height: 250px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="text-white mb-0">Area Parkir</h5>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <span class="badge bg-primary me-2">H</span>
                                Tempat Perlengkapan
                            </h5>
                            <p class="card-text text-white-50 small mb-0">
                                Area penyimpanan dan perlengkapan terminal
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

</body>
<style>
    /* ===== Animasi Layout Card ===== */
    .layout-card {
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .layout-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2) !important;
    }

    .layout-img-wrapper {
        overflow: hidden;
        border-radius: 0.375rem;
        position: relative;
    }

    .layout-img {
        transition: transform 0.6s ease;
    }

    .layout-img:hover {
        transform: scale(1.1);
    }

    /* Animasi Pulse pada Layout */
    @keyframes pulse-shadow {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.7);
        }

        50% {
            box-shadow: 0 0 0 15px rgba(13, 110, 253, 0);
        }
    }

    .layout-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #0d6efd, #0dcaf0, #0d6efd);
        border-radius: 0.5rem;
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: -1;
        animation: pulse-shadow 2s infinite;
    }

    .layout-card:hover::before {
        opacity: 0.3;
    }

    /* ===== Animasi Facility Cards ===== */
    .facility-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .facility-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
        z-index: 1;
    }

    .facility-card:hover::before {
        left: 100%;
    }

    .facility-card:hover {
        transform: translateY(-15px) scale(1.03);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3) !important;
    }

    /* Animasi untuk gambar fasilitas */
    .facility-img-wrapper {
        overflow: hidden;
        position: relative;
    }

    .facility-img {
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        will-change: transform;
    }

    .facility-card:hover .facility-img {
        transform: scale(1.15) rotate(2deg);
    }

    /* Card body styling */
    .facility-card .card-body {
        position: relative;
        z-index: 2;
    }

    /* ===== Button Styling ===== */
    .btn-primary {
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
    }

    .btn-primary:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(13, 110, 253, 0.4);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    /* ===== Back to Top Button ===== */
    .back-to-top {
        transition: all 0.3s ease;
    }

    .back-to-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.5);
    }

    /* ===== Smooth Scroll Behavior ===== */
    html {
        scroll-behavior: smooth;
    }

    /* ===== Loading Animation for Images ===== */
    .facility-img,
    .layout-img {
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* ===== Responsive Adjustments ===== */
    @media (max-width: 768px) {
        .facility-card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .layout-card:hover {
            transform: translateY(-5px) scale(1.01);
        }
    }
</style>

@endsection