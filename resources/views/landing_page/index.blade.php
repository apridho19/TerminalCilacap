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

  <!-- Carousel Start -->
  <div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li
          data-bs-target="#carouselId"
          data-bs-slide-to="0"
          class="active"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="{{ asset('assets/img/gedung_depan.jpg') }}" class="img-fluid" alt="Image" />
          <div class="carousel-caption">
            <div class="text-center p-4" style="max-width: 900px">
              <h4
                class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp"
                data-wow-delay="0.1s">
                BPTD Kelas I Jawa Tengah
              </h4>
              <h1
                class="display-3 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp"
                data-wow-delay="0.3s">
                Terminal Tipe A Bangga Mbangun Desa Cilacap
              </h1>
              <p
                class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp"
                data-wow-delay="0.5s">
                Jl. Gatot Subroto No.268, Gunungsimping, Kab. Cilacap
              </p>
              <a
                class="btn btn-primary border-warning rounded-pill text-white py-3 px-5 wow fadeInUp"
                data-wow-delay="0.7s"
                href="#">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="{{ asset('assets/img/terminal-bus-cilacap-1.jpg') }}"
            class="img-fluid"
            alt="Image" />
          <div class="carousel-caption">
            <div class="text-center p-4" style="max-width: 900px">
              <h4
                class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp"
                data-wow-delay="0.1s">
                BPTD Kelas I Jawa Tengah
              </h4>
              <h1
                class="display-3 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp"
                data-wow-delay="0.3s">
                Terminal Tipe A Bangga Mbangun Desa Cilacap
              </h1>
              <p
                class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp"
                data-wow-delay="0.5s">
                Jl. Gatot Subroto No.268, Gunungsimping, Kab. Cilacap
              </p>
              <a
                class="btn btn-primary border-warning rounded-pill text-white py-3 px-5 wow fadeInUp"
                data-wow-delay="0.7s"
                href="#">Lihat Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselId"
        data-bs-slide="prev">
        <span
          class="carousel-control-prev-icon bg-primary wow fadeInLeft"
          data-wow-delay="0.2s"
          aria-hidden="false"></span>
        <span class="visually-hidden-focusable">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselId"
        data-bs-slide="next">
        <span
          class="carousel-control-next-icon bg-primary wow fadeInRight"
          data-wow-delay="0.2s"
          aria-hidden="false"></span>
        <span class="visually-hidden-focusable">Next</span>
      </button>
    </div>
  </div>
  <!-- Carousel End -->

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

  <!-- About Start -->
  <div class="container-fluid py-5">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
          <div class="bg-light rounded">
            <img
              src="{{ asset('assets/img/logo_terminal.png') }}"
              class="img-fluid w-100"
              style="margin-bottom: -100px"
              alt="Image" />
            <img
              src="{{ asset('assets/img/gedung_depan.jpg') }}"
              class="img-fluid w-100 border-bottom border-5 border-primary"
              style="
                  border-top-right-radius: 300px;
                  border-top-left-radius: 300px;
                "
              alt="Image" />
          </div>
        </div>
        <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
          <h5 class="sub-title pe-3">Kilas Balik</h5>
          <h1 class="display-5 mb-4">
            Tentang Kami - <br />
            Terminal Tipe A Bangga Mbangun Desa Cilacap
          </h1>

          <p class="mb-4 text-justify">
            Terminal Tipe A Bangga Mbangun Desa yang terletak di Kabupaten
            Cilacap, merupakan salah satu terminal tipe A yang dikelola oleh
            Balai Pengelola Transportasi Darat (BPTD) Jawa Tengah. Terminal
            ini berfungsi sebagai pusat transportasi darat yang menghubungkan
            berbagai kota dan daerah di Jawa Tengah dan sekitarnya.
            <br /><br />
            Asal usul nama terminal bermula dari nama gerakan yang tercantum
            pada Peraturan Bupati Cilacap Nomor 76 Tahun 2011, yakni mengenai
            pedoman pelaksanaan gerakan "Bangga Mbangun Desa". Terminal ini
            menerapkan konsep eco green building sesuai dengan PM Perhubungan
            Nomor 132 Tahun 2015 Tentang Penyelenggaraan Terminal Penumpang
            Angkutan Jalan.
            <br /><br />
            Berbeda dengan pelayanan terdahulu, pada saat Pukul 20.00 WIB
            terminal tampak mulai sepi. Akan tetapi, untuk saat ini Terminal
            Tipe A Bangga Mbangun Desa (TTA BMD) telah melayani penumpang
            setiap hari selama 24 jam.TTA BMD memiliki 9 (sembilan) lajur bus
            Antar Kota Antar Provinsi (AKAP), 4 (empat) lajur bus Antar Kota
            Dalam Provinsi (AKDP), dan satu lajur alternatif untuk angkutan
            kota.
          </p>
    
              <div class="col-12 col-sm-6 d-flex align-items-center">
                <i class="fas fa-map-marked-alt fa-3x text-warning"></i>
                <h5 class="ms-4">Best Immigration Resources</h5>
              </div>
              <div class="col-12 col-sm-6 d-flex align-items-center">
                <i class="fas fa-passport fa-3x text-warning"></i>
                <h5 class="ms-4">Return Visas Availabile</h5>
              </div>
              <div class="col-4 col-md-3">
                <div class="bg-light text-center rounded p-3">
                  <div class="mb-2">
                    <i class="fas fa-ticket-alt fa-4x text-primary"></i>
                  </div>
                  <h1 class="display-5 fw-bold mb-2">34</h1>
                  <p class="text-muted mb-0">Years of Experience</p>
                </div>
              </div>
              <div class="col-8 col-md-9">
                <div class="mb-5">
                  <p class="text-primary h6 mb-3">
                    <i class="fa fa-check-circle text-warning me-2"></i> Offer
                    100 % Genuine Assistance
                  </p>
                  <p class="text-primary h6 mb-3">
                    <i class="fa fa-check-circle text-warning me-2"></i> It’s
                    Faster & Reliable Execution
                  </p>
                  <p class="text-primary h6 mb-3">
                    <i class="fa fa-check-circle text-warning me-2"></i>
                    Accurate & Expert Advice
                  </p>
                </div>
                <div class="d-flex flex-wrap">
                  <div
                    id="phone-tada"
                    class="d-flex align-items-center justify-content-center me-4"
                  >
                    <a
                      href=""
                      class="position-relative wow tada"
                      data-wow-delay=".9s"
                    >
                      <i class="fa fa-phone-alt text-primary fa-3x"></i>
                      <div class="position-absolute" style="top: 0; left: 25px">
                        <span
                          ><i class="fa fa-comment-dots text-warning"></i
                        ></span>
                      </div>
                    </a>
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <span class="text-primary">Have any questions?</span>
                    <span
                      class="text-warning fw-bold fs-5"
                      style="letter-spacing: 2px"
                      >Free: +0123 456 7890</span
                    >
                  </div>
                </div>
              </div>
            </div> -->
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

  <!-- Layanan Kami Start -->
  <div class="container-fluid training overflow-hidden bg-light py-5">
    <div class="container py-5">
      <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="sub-style">
          <h5 class="sub-title text-primary px-3">Layanan Kami</h5>
        </div>
        <h1 class="display-5 mb-4">Layanan Terminal BMD Cilacap</h1>
        <p class="mb-0">
          Berbagai layanan informasi dan fasilitas untuk mendukung perjalanan Anda dengan nyaman dan aman
        </p>
      </div>
      <div class="row g-4">
        <!-- Maklumat Pelayanan -->
        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
          <div class="training-item h-100">
            <div class="training-inner">
              <img src="{{ asset('assets/img/gedung_depan.jpg') }}" class="img-fluid w-100 rounded" alt="Maklumat" style="height: 250px; object-fit: cover;" />
              <div class="training-title-name">
                <a href="{{ url('/maklumat') }}" class="h4 text-white mb-0">Maklumat</a>
                <a href="{{ url('/maklumat') }}" class="h4 text-white mb-0">Pelayanan</a>
              </div>
            </div>
            <div class="training-content bg-secondary rounded-bottom p-4">
              <a href="{{ url('/maklumat') }}">
                <h4 class="text-white">Maklumat Pelayanan</h4>
              </a>
              <p class="text-white-50">
                Komitmen kami dalam memberikan pelayanan terbaik kepada seluruh pengguna jasa Terminal BMD Cilacap
              </p>
              <a class="btn btn-warning rounded-pill text-white py-2 px-4" href="{{ url('/maklumat') }}">
                Selengkapnya <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Tarif Tiket -->
        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
          <div class="training-item h-100">
            <div class="training-inner">
              <img src="{{ asset('assets/img/terminal-bus-cilacap-1.jpg') }}" class="img-fluid w-100 rounded" alt="Tarif" style="height: 250px; object-fit: cover;" />
              <div class="training-title-name">
                <a href="{{ url('/tarif_tiket') }}" class="h4 text-white mb-0">Informasi</a>
                <a href="{{ url('/tarif_tiket') }}" class="h4 text-white mb-0">Tarif</a>
              </div>
            </div>
            <div class="training-content bg-secondary rounded-bottom p-4">
              <a href="{{ url('/tarif_tiket') }}">
                <h4 class="text-white">Informasi Tarif Tiket</h4>
              </a>
              <p class="text-white-50">
                Daftar lengkap tarif tiket bus AKAP dan AKDP untuk berbagai tujuan keberangkatan dari Terminal Cilacap
              </p>
              <a class="btn btn-warning rounded-pill text-white py-2 px-4" href="{{ url('/tarif_tiket') }}">
                Selengkapnya <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Daftar PO Bus -->
        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
          <div class="training-item h-100">
            <div class="training-inner">
              <img src="{{ asset('assets/img/terminal-bus-cilacap-2.jpg') }}" class="img-fluid w-100 rounded" alt="PO Bus" style="height: 250px; object-fit: cover;" />
              <div class="training-title-name">
                <a href="{{ url('/daftar_po') }}" class="h4 text-white mb-0">Daftar</a>
                <a href="{{ url('/daftar_po') }}" class="h4 text-white mb-0">PO Bus</a>
              </div>
            </div>
            <div class="training-content bg-secondary rounded-bottom p-4">
              <a href="{{ url('/daftar_po') }}">
                <h4 class="text-white">Daftar PO Bus</h4>
              </a>
              <p class="text-white-50">
                Informasi lengkap Perusahaan Otobus (PO) yang beroperasi di Terminal BMD Cilacap
              </p>
              <a class="btn btn-warning rounded-pill text-white py-2 px-4" href="{{ url('/daftar_po') }}">
                Selengkapnya <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Survei Kepuasan -->
        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
          <div class="training-item h-100">
            <div class="training-inner">
              <img src="{{ asset('assets/img/terminal-bus-cilacap.jpg') }}" class="img-fluid w-100 rounded" alt="SKM" style="height: 250px; object-fit: cover;" />
              <div class="training-title-name">
                <a href="{{ url('/hasil_skm') }}" class="h4 text-white mb-0">Survei</a>
                <a href="{{ url('/hasil_skm') }}" class="h4 text-white mb-0">SKM</a>
              </div>
            </div>
            <div class="training-content bg-secondary rounded-bottom p-4">
              <a href="{{ url('/hasil_skm') }}">
                <h4 class="text-white">Survei Kepuasan Masyarakat</h4>
              </a>
              <p class="text-white-50">
                Berikan penilaian Anda tentang kualitas pelayanan Terminal BMD Cilacap melalui survei kepuasan masyarakat
              </p>
              <a class="btn btn-warning rounded-pill text-white py-2 px-4" href="{{ url('/hasil_skm') }}">
                Selengkapnya <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Layanan Pengaduan -->
        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
          <div class="training-item h-100">
            <div class="training-inner">
              <img src="{{ asset('assets/img/ruang_rapat.jpeg') }}" class="img-fluid w-100 rounded" alt="Pengaduan" style="height: 250px; object-fit: cover;" />
              <div class="training-title-name">
                <a href="{{ url('/layanan_pengaduan') }}" class="h4 text-white mb-0">Layanan</a>
                <a href="{{ url('/layanan_pengaduan') }}" class="h4 text-white mb-0">Pengaduan</a>
              </div>
            </div>
            <div class="training-content bg-secondary rounded-bottom p-4">
              <a href="{{ url('/layanan_pengaduan') }}">
                <h4 class="text-white">Layanan Pengaduan</h4>
              </a>
              <p class="text-white-50">
                Sampaikan kritik, saran, atau keluhan Anda untuk membantu kami meningkatkan kualitas pelayanan
              </p>
              <a class="btn btn-warning rounded-pill text-white py-2 px-4" href="{{ url('/layanan_pengaduan') }}">
                Selengkapnya <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Fasilitas Terminal -->
        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
          <div class="training-item h-100">
            <div class="training-inner">
              <img src="{{ asset('assets/img/pintu_masuk_terminal.jpg') }}" class="img-fluid w-100 rounded" alt="Fasilitas" style="height: 250px; object-fit: cover;" />
              <div class="training-title-name">
                <a href="{{ url('/fasilitas') }}" class="h4 text-white mb-0">Denah &</a>
                <a href="{{ url('/fasilitas') }}" class="h4 text-white mb-0">Fasilitas</a>
              </div>
            </div>
            <div class="training-content bg-secondary rounded-bottom p-4">
              <a href="{{ url('/fasilitas') }}">
                <h4 class="text-white">Denah & Fasilitas</h4>
              </a>
              <p class="text-white-50">
                Lihat denah lengkap dan berbagai fasilitas yang tersedia di Terminal BMD Cilacap untuk kenyamanan Anda
              </p>
              <a class="btn btn-warning rounded-pill text-white py-2 px-4" href="{{ url('/fasilitas') }}">
                Selengkapnya <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Layanan Kami End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
</body>
@endsection