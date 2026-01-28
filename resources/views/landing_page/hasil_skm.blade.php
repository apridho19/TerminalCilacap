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
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Survei Kepuasan Masyarakat</h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- SKM Content Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <!-- Section Title -->
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">SURVEI KEPUASAN MASYARAKAT</h5>
                </div>
                <h1 class="display-5 mb-4">Berikan Penilaian Anda</h1>
                <p class="mb-0">Partisipasi Anda dalam survei ini sangat berarti bagi kami untuk terus meningkatkan kualitas pelayanan Terminal Cilacap</p>
            </div>

            <div class="row g-5 align-items-center">
                <!-- QR Code Section -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light rounded p-5 text-center shadow">
                        <div class="mb-4">
                            <i class="fa fa-qrcode fa-3x text-primary mb-3"></i>
                            <h3 class="text-primary mb-3">Scan QR Code</h3>
                            <p class="text-muted">Pindai QR Code di bawah ini untuk mengisi survei kepuasan masyarakat</p>
                        </div>

                        <!-- QR Code Image -->
                        <div class="qr-code-wrapper mb-4">
                            <img src="{{ asset('assets/img/SKM.png') }}"
                                alt="QR Code SKM"
                                class="img-fluid rounded shadow-sm"
                                style="max-width: 350px; border: 8px solid #fff; background: #fff;">
                        </div>

                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <i class="fa fa-info-circle me-2"></i>
                            <div class="text-start">
                                <strong>Cara Menggunakan:</strong><br>
                                <small>1. Buka aplikasi kamera atau scanner QR di HP Anda<br>
                                    2. Arahkan kamera ke QR Code di atas<br>
                                    3. Klik link yang muncul untuk membuka survei</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="mb-5">
                        <h2 class="text-primary mb-4">Tentang Survei Kepuasan Masyarakat</h2>
                        <p class="mb-4">Survei Kepuasan Masyarakat (SKM) adalah pengukuran tingkat kepuasan pengguna layanan publik yang dilakukan secara berkala untuk mengetahui kualitas pelayanan yang diberikan.</p>
                    </div>

                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-circle p-3 me-3" style="min-width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-clock text-white" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Cepat & Mudah</h5>
                                    <p class="mb-0 text-muted">Survei hanya memerlukan waktu 3-5 menit untuk diselesaikan</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning rounded-circle p-3 me-3" style="min-width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-shield-alt text-white" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Aman & Terpercaya</h5>
                                    <p class="mb-0 text-muted">Identitas Anda dijaga kerahasiaannya dan data akan digunakan untuk kepentingan evaluasi layanan</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-circle p-3 me-3" style="min-width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-chart-line text-white" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Meningkatkan Kualitas</h5>
                                    <p class="mb-0 text-muted">Masukan Anda membantu kami meningkatkan kualitas pelayanan di Terminal Cilacap</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning rounded-circle p-3 me-3" style="min-width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-mobile-alt text-white" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Akses via Mobile</h5>
                                    <p class="mb-0 text-muted">Dapat diakses melalui smartphone Anda kapan saja dan dimana saja</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 p-4 bg-light rounded">
                        <h6 class="text-primary mb-3"><i class="fa fa-star me-2"></i>Aspek yang Dinilai:</h6>
                        <ul class="mb-0">
                            <li>Prosedur pelayanan</li>
                            <li>Persyaratan pelayanan</li>
                            <li>Kejelasan petugas pelayanan</li>
                            <li>Kedisiplinan petugas</li>
                            <li>Tanggung jawab petugas</li>
                            <li>Kemampuan petugas</li>
                            <li>Kecepatan pelayanan</li>
                            <li>Keadilan mendapatkan pelayanan</li>
                            <li>Kesopanan dan keramahan petugas</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Alternative Access -->
            <div class="row mt-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-primary rounded p-4 text-center">
                        <h5 class="text-white mb-3">Tidak Bisa Scan QR Code?</h5>
                        <p class="text-white mb-3">Anda juga dapat mengakses survei melalui link berikut:</p>
                        <a href="https://skm.dephub.go.id/ly/1GtP0jb8" class="btn btn-warning rounded-pill py-3 px-5" target="_blank">
                            <i class="fa fa-external-link-alt me-2"></i>Buka Survei Online
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SKM Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

</body>
@endsection