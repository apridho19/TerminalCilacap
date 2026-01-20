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
        <div class="container text-center py-5" style="max-width: 900px">
            <h3
                class="text-white display-3 mb-4 wow fadeInDown"
                data-wow-delay="0.1s">
                Tarif Tiket ke Jawa Barat
            </h3>
            <nav aria-label="breadcrumb">
                <ol
                    class="breadcrumb justify-content-center mb-0 wow fadeInDown"
                    data-wow-delay="0.3s">
                    <!-- <li class="breadcrumb-item">
                        <a href="{{url ('/index')}}" class="text-white">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('/tarif_tiket')}}" class="text-white">Tarif Tiket</a>
                    </li>
                    <li class="breadcrumb-item active text-warning">Jawa Barat</li> -->
                </ol>
            </nav>
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
                    <h5 class="sub-title text-primary px-3">Tarif Bus ke Jawa Barat</h5>
                </div>
                <h1 class="display-5 mb-4">Daftar Tarif Tiket ke Jawa Barat</h1>
                <p class="mb-0">
                    Terminal BMD Cilacap menyediakan layanan bus ke berbagai wilayah di
                    Jawa Barat dengan jadwal yang fleksibel
                </p>
            </div>

            <!-- Navigation Links -->
            <div class="text-center mb-4 wow fadeInUp" data-wow-delay="0.2s">
                <a
                    href="{{url('/tarif_tiket')}}"
                    class="btn btn-outline-primary border-warning rounded-pill px-4 py-2 me-3">
                    <i class="fas fa-list me-2"></i>Semua Provinsi
                </a>
            </div>

            <!-- Tabel Tarif Jakarta -->
            <div class="card border-0 shadow-lg wow fadeInUp" data-wow-delay="0.3s">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-mountain me-2"></i>Tarif Tiket Bus ke Jawa Barat
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead class="table-warning">
                                <tr class="text-center">
                                    <th style="width: 5%">No.</th>
                                    <th style="width: 15%">Nama PO Bus</th>
                                    <th style="width: 12%">Kelas</th>
                                    <th style="width: 15%">Tujuan</th>
                                    <th style="width: 12%">Harga</th>
                                    <th style="width: 15%">Jam Keberangkatan</th>
                                    <th style="width: 16%">Nomor Agen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ARIES</td>
                                    <td>EKONOMI</td>
                                    <td>CIREBON</td>
                                    <td>Rp100.000,00</td>
                                    <td>13:00 / 03:30 / 04:30 / 05:30 / 06:30</td>
                                    <td>085220833770 / 081234250420</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>SARI GEDE</td>
                                    <td>EKONOMI</td>
                                    <td>CIREBON</td>
                                    <td>Rp100.000,00</td>
                                    <td>03:00 / 06:00 / 13:30</td>
                                    <td>085877603572</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ARIES</td>
                                    <td>EKONOMI</td>
                                    <td>INDRAMAYU</td>
                                    <td>Rp120.000,00</td>
                                    <td>13:00</td>
                                    <td>085220833770</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>ARIES</td>
                                    <td>EKONOMI</td>
                                    <td>KARANG AMPEL</td>
                                    <td>Rp120.000,00</td>
                                    <td>13:00</td>
                                    <td>085220833770</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>DAMRI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KARAWANG</td>
                                    <td>Rp155.000,00</td>
                                    <td>15:00 / 19:00</td>
                                    <td>0895322320525 & 089665561205</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>DMI</td>
                                    <td>BISNIS AC</td>
                                    <td>KARAWANG</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KARAWANG</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KARAWANG</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF LEGRES</td>
                                    <td>KARAWANG</td>
                                    <td>Rp130.000,00</td>
                                    <td>18:20</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KLARI</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>HIKMAH AGUNG</td>
                                    <td>EKONOMI</td>
                                    <td>PANGANDARAN</td>
                                    <td>Rp20.000,00 - Rp80.000,00</td>
                                    <td>06:30</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Informasi Tambahan -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="alert alert-info border-0 shadow-sm" role="alert">
                        <h5 class="alert-heading">
                            <i class="fas fa-info-circle me-2"></i>Informasi Penting
                        </h5>
                        <p class="mb-1">
                            <i class="fas fa-clock me-2 text-warning"></i>Jadwal
                            keberangkatan dapat berubah sewaktu-waktu
                        </p>
                        <p class="mb-1">
                            <i class="fas fa-phone me-2 text-warning"></i>Hubungi nomor agen
                            untuk reservasi dan konfirmasi
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-ticket-alt me-2 text-warning"></i>Harga tiket
                            sudah termasuk asuransi perjalanan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tarif Tiket End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


</body>
@endsection