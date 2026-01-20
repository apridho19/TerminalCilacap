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
        <div class="container text-center py-5" style="max-width: 900px">
            <h3
                class="text-white display-3 mb-4 wow fadeInDown"
                data-wow-delay="0.1s">
                Tarif Tiket Bus
            </h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- Tarif Tiket Start -->
    <div class="container-fluid service overflow-hidden py-5">
        <div class="container py-5">
            <div
                class="section-title text-center mb-5 wow fadeInUp"
                data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Informasi Tarif</h5>
                </div>
                <h1 class="display-5 mb-4">Tarif Tiket Bus Terminal BMD Cilacap</h1>
                <p class="mb-0">
                    Informasi lengkap mengenai tarif tiket bus dari Terminal BMD Cilacap
                    ke berbagai tujuan di Provinsi Banten, DKI Jakarta, Jawa Barat, Jawa
                    Tengah, dan D.I. Yogyakarta
                </p>
            </div>

            <!-- Pilihan Provinsi Tujuan -->
            <div class="row justify-content-center g-4 mb-4">

                <!-- Card DKI Jakarta -->
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch wow fadeInUp" data-wow-delay="0.4s">
                    <div class="card border-0 shadow-lg h-100 province-card">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <img
                                src="{{ asset('assets/img/logo_jakarta.png') }}"
                                alt="DKI Jakarta"
                                class="mb-3"
                                style="height: 70px; object-fit: contain" />
                            <h4 class="mb-0">JABODETABEK</h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="text-center mb-4">
                                <h5 class="text-primary mb-3">TRAYEK KE JABODETABEK</h5>
                                <p class="text-muted">
                                    Bus ke berbagai wilayah di JABODETABEK seperti Kampung
                                    Rambutan, Kalideres, Grogol, dan lainnya
                                </p>
                            </div>

                            <!-- Highlight Tarif -->
                            <div class="row text-center mb-4">
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">Tarif Mulai</small>
                                        <strong class="text-success">IDR 110.000</strong>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">PO Bus</small>
                                        <strong class="text-primary">3 Operator</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Tujuan Populer -->
                            <div class="mb-4">
                                <h6 class="text-primary mb-2">Tujuan Populer:</h6>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-warning text-dark">Kampung Rambutan</span>
                                    <span class="badge bg-warning text-dark">Kalideres</span>
                                    <span class="badge bg-warning text-dark">Grogol</span>
                                    <span class="badge bg-warning text-dark">Tanjung Priok</span>
                                    <span class="badge bg-warning text-dark">Pulo Gebang</span>
                                </div>
                            </div>

                            <div class="mt-auto text-center">
                                <a
                                    href="{{ url('/tarif_jabodetabek') }}"
                                    class="btn btn-primary border-warning rounded-pill px-4 py-2 w-100">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail Tarif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Jawa Barat -->
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch wow fadeInUp" data-wow-delay="0.6s">
                    <div class="card border-0 shadow-lg h-100 province-card">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <img
                                src="{{ asset('assets/img/logo_jabar.png') }}"
                                alt="Jawa Barat"
                                class="mb-3"
                                style="height: 70px; object-fit: contain" />
                            <h4 class="mb-0">Jawa Barat</h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="text-center mb-4">
                                <h5 class="text-primary mb-3">TRAYEK KE JAWA BARAT</h5>
                                <p class="text-muted">
                                    Bus ke berbagai wilayah di Jawa Barat seperti Bandung,
                                    Bekasi, Bogor, dan lainnya
                                </p>
                            </div>

                            <!-- Highlight Tarif -->
                            <div class="row text-center mb-4">
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">Tarif Mulai</small>
                                        <strong class="text-success">IDR 50.000</strong>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">PO Bus</small>
                                        <strong class="text-primary">5 Operator</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Tujuan Populer -->
                            <div class="mb-4">
                                <h6 class="text-primary mb-2">Tujuan Populer:</h6>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-warning text-dark">Bandung</span>
                                    <span class="badge bg-warning text-dark">Bekasi</span>
                                    <span class="badge bg-warning text-dark">Bogor</span>
                                    <span class="badge bg-warning text-dark">Depok</span>
                                    <span class="badge bg-warning text-dark">Cirebon</span>
                                </div>
                            </div>

                            <div class="mt-auto text-center">
                                <a
                                    href="{{ url('/tarif_jabar') }}"
                                    class="btn btn-primary border-warning rounded-pill px-4 py-2 w-100">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail Tarif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Jawa Tengah -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="card border-0 shadow-lg h-100 province-card">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <img
                                src="{{ asset('assets/img/logo_jateng.png') }}"
                                alt="Jawa Tengah dan DIY"
                                class="mb-3"
                                style="height: 70px; object-fit: contain" />
                            <h4 class="mb-0">Jawa Tengah dan DIY</h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="text-center mb-4">
                                <h5 class="text-primary mb-3">TRAYEK KE JAWA TENGAH DAN DIY</h5>
                                <p class="text-muted">
                                    Bus ke kota-kota di Jawa Tengah dan DIY seperti Purwokerto, Solo,
                                    Semarang, Kebumen, dan lainnya
                                </p>
                            </div>

                            <!-- Highlight Tarif -->
                            <div class="row text-center mb-4">
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">Tarif Mulai</small>
                                        <strong class="text-success">IDR 10.000</strong>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">PO Bus</small>
                                        <strong class="text-primary">12 Operator</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Tujuan Populer -->
                            <div class="mb-4">
                                <h6 class="text-primary mb-2">Tujuan Populer:</h6>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-warning text-dark">Purwokerto</span>
                                    <span class="badge bg-warning text-dark">Solo</span>
                                    <span class="badge bg-warning text-dark">Semarang</span>
                                    <span class="badge bg-warning text-dark">Kebumen</span>
                                    <span class="badge bg-warning text-dark">Yogyakarta</span>
                                </div>
                            </div>

                            <div class="mt-auto text-center">
                                <a
                                    href="{{ url('/tarif_jateng') }}"
                                    class="btn btn-primary border-warning rounded-pill px-4 py-2 w-100">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail Tarif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Jawa Timur -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="1.2s">
                    <div class="card border-0 shadow-lg h-100 province-card">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <img
                                src="{{ asset('assets/img/logo_jatim.png') }}"
                                alt="Jawa Timur"
                                class="mb-3"
                                style="height: 70px; object-fit: contain" />
                            <h4 class="mb-0">Jawa Timur</h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="text-center mb-4">
                                <h5 class="text-primary mb-3">TRAYEK KE JAWA TIMUR</h5>
                                <p class="text-muted">
                                    Bus ke kota-kota di Jawa Timur seperti Surabaya, Malang,
                                    Madiun, Jember, dan lainnya
                                </p>
                            </div>

                            <!-- Highlight Tarif -->
                            <div class="row text-center mb-4">
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">Tarif Mulai</small>
                                        <strong class="text-success">IDR 155.000</strong>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border rounded p-2">
                                        <small class="text-muted d-block">PO Bus</small>
                                        <strong class="text-primary">4 Operator</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Tujuan Populer -->
                            <div class="mb-4">
                                <h6 class="text-primary mb-2">Tujuan Populer:</h6>
                                <div class="d-flex flex-wrap gap-1">
                                    <span class="badge bg-warning text-dark">Surabaya</span>
                                    <span class="badge bg-warning text-dark">Malang</span>
                                    <span class="badge bg-warning text-dark">Madiun</span>
                                    <span class="badge bg-warning text-dark">Jember</span>
                                    <span class="badge bg-warning text-dark">Kediri</span>
                                </div>
                            </div>

                            <div class="mt-auto text-center">
                                <a
                                    href="{{ url('/tarif_jatim') }}"
                                    class="btn btn-primary border-warning rounded-pill px-4 py-2 w-100">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail Tarif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Umum -->
            <div class="row">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="card border-0 shadow-sm bg-light">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="card-title text-primary mb-2">
                                        <i class="fas fa-info-circle me-2"></i>Informasi Penting
                                    </h5>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-1">
                                            <i class="fas fa-check text-success me-2"></i>Jadwal
                                            keberangkatan dapat berubah sewaktu-waktu
                                        </li>
                                        <li class="mb-1">
                                            <i class="fas fa-check text-success me-2"></i>Hubungi
                                            nomor agen untuk reservasi dan konfirmasi
                                        </li>
                                        <li class="mb-0">
                                            <i class="fas fa-check text-success me-2"></i>Harga
                                            tiket sudah termasuk asuransi perjalanan
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div
                                        class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                        style="width: 80px; height: 80px">
                                        <i class="fas fa-bus text-white fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tarif Tiket End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

</body>

<style>
    .province-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .province-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.province-card');

        cards.forEach(card => {
            card.addEventListener('click', function() {
                card.classList.add('animate__animated', 'animate__pulse');

                // Remove animation class after animation ends
                card.addEventListener('animationend', () => {
                    card.classList.remove('animate__animated', 'animate__pulse');
                });
            });
        });
    });
</script>
@endsection