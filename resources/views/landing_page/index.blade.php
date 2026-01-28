@extends('landing_page.layouts.main')

@section('content')

<style>
  /* Service Item Hover Effects */
  .service-item {
    transition: all 0.5s ease;
    position: relative;
    overflow: hidden;
    border: 1px solid #e9ecef;
    background: #fff;
  }

  .service-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    border-color: transparent;
  }

  .service-img {
    position: relative;
    overflow: hidden;
  }

  .service-img img {
    transition: all 0.5s ease;
    transform: scale(1);
  }

  .service-item:hover .service-img img {
    transform: scale(1.1) rotate(2deg);
  }

  .service-icon {
    transition: all 0.4s ease;
    animation: float 3s ease-in-out infinite;
  }

  .service-item:hover .service-icon {
    transform: scale(1.1) rotate(360deg);
    background: var(--bs-primary) !important;
  }

  .service-item:hover .service-icon i {
    color: #fff !important;
  }

  .service-item:hover .service-icon.border-warning {
    background: var(--bs-warning) !important;
  }

  @keyframes float {

    0%,
    100% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-10px);
    }
  }

  .service-content {
    position: relative;
    transition: all 0.4s ease;
  }

  .service-item:hover .service-content {
    background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
  }

  .btn {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
  }

  .btn:hover::before {
    width: 300px;
    height: 300px;
  }

  .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  }

  /* Section Title Animation */
  .section-title h1 {
    position: relative;
    display: inline-block;
  }

  .section-title h1::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--bs-primary), var(--bs-warning));
    transition: width 0.6s ease;
  }

  .section-title:hover h1::after {
    width: 100%;
  }

  /* Pulse animation for service cards on load */
  @keyframes pulseIn {
    0% {
      opacity: 0;
      transform: scale(0.8);
    }

    50% {
      transform: scale(1.05);
    }

    100% {
      opacity: 1;
      transform: scale(1);
    }
  }

  .service-item.wow {
    animation: pulseIn 0.6s ease-out;
  }

  /* Smooth background gradient animation */
  .service.py-5 {
    background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 50%, #ffffff 100%);
  }

  /* Icon shine effect */
  @keyframes shine {
    0% {
      box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
    }

    50% {
      box-shadow: 0 0 20px rgba(13, 110, 253, 0.8);
    }

    100% {
      box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
    }
  }

  .service-icon {
    animation: shine 2s ease-in-out infinite;
  }

  .service-icon.border-warning {
    animation: shineWarning 2s ease-in-out infinite;
  }

  @keyframes shineWarning {
    0% {
      box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }

    50% {
      box-shadow: 0 0 20px rgba(255, 193, 7, 0.8);
    }

    100% {
      box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }
  }

  /* Title badge animation */
  .sub-title {
    position: relative;
    animation: slideInBounce 1s ease-out;
  }

  @keyframes slideInBounce {
    0% {
      transform: translateX(-100px);
      opacity: 0;
    }

    60% {
      transform: translateX(10px);
    }

    100% {
      transform: translateX(0);
      opacity: 1;
    }
  }
</style>

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
          <!-- <div class="row gy-4 align-items-center">
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

  <!-- Layanan Start -->
  <div class="container-fluid service py-5">
    <div class="container py-5">
      <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="sub-style">
          <h5 class="sub-title text-primary px-3">LAYANAN KAMI</h5>
        </div>
        <h1 class="display-5 mb-4">Informasi & Layanan Terminal</h1>
        <p class="mb-0">Akses mudah ke berbagai informasi dan layanan yang Anda butuhkan</p>
      </div>

      <div class="row g-4">
        <!-- Maklumat Pelayanan -->
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100">
            <div class="service-img rounded-top">
              <img src="{{ asset('assets/img/office-1.jpg') }}" class="img-fluid w-100 rounded-top" alt="Maklumat">
            </div>
            <div class="service-content rounded-bottom bg-light p-4">
              <div class="service-content-inner">
                <div class="d-flex align-items-center mb-3">
                  <div class="service-icon p-3 border border-primary bg-white rounded-circle me-3">
                    <i class="fa fa-award text-primary fa-2x"></i>
                  </div>
                  <h5 class="mb-0">Maklumat Pelayanan</h5>
                </div>
                <p class="mb-4">Komitmen kami dalam memberikan pelayanan terbaik kepada masyarakat</p>
                <a href="{{ url('/maklumat') }}" class="btn btn-primary rounded-pill px-4 py-2">
                  Lihat Detail <i class="fa fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Tarif Tiket -->
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100">
            <div class="service-img rounded-top">
              <img src="{{ asset('assets/img/office-2.jpg') }}" class="img-fluid w-100 rounded-top" alt="Tarif">
            </div>
            <div class="service-content rounded-bottom bg-light p-4">
              <div class="service-content-inner">
                <div class="d-flex align-items-center mb-3">
                  <div class="service-icon p-3 border border-warning bg-white rounded-circle me-3">
                    <i class="fa fa-ticket-alt text-warning fa-2x"></i>
                  </div>
                  <h5 class="mb-0">Tarif Tiket</h5>
                </div>
                <p class="mb-4">Informasi lengkap tarif bus AKAP dan AKDP berbagai tujuan</p>
                <a href="{{ url('/tarif_tiket') }}" class="btn btn-warning rounded-pill px-4 py-2">
                  Lihat Tarif <i class="fa fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Daftar PO -->
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100">
            <div class="service-img rounded-top">
              <img src="{{ asset('assets/img/office-3.jpg') }}" class="img-fluid w-100 rounded-top" alt="PO Bus">
            </div>
            <div class="service-content rounded-bottom bg-light p-4">
              <div class="service-content-inner">
                <div class="d-flex align-items-center mb-3">
                  <div class="service-icon p-3 border border-primary bg-white rounded-circle me-3">
                    <i class="fa fa-bus text-primary fa-2x"></i>
                  </div>
                  <h5 class="mb-0">Daftar PO Bus</h5>
                </div>
                <p class="mb-4">Perusahaan Otobus yang beroperasi di Terminal BMD Cilacap</p>
                <a href="{{ url('/daftar_po') }}" class="btn btn-primary rounded-pill px-4 py-2">
                  Lihat Daftar <i class="fa fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Survei Kepuasan -->
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100">
            <div class="service-img rounded-top">
              <img src="{{ asset('assets/img/office-4.jpg') }}" class="img-fluid w-100 rounded-top" alt="SKM">
            </div>
            <div class="service-content rounded-bottom bg-light p-4">
              <div class="service-content-inner">
                <div class="d-flex align-items-center mb-3">
                  <div class="service-icon p-3 border border-warning bg-white rounded-circle me-3">
                    <i class="fa fa-chart-line text-warning fa-2x"></i>
                  </div>
                  <h5 class="mb-0">Survei Kepuasan</h5>
                </div>
                <p class="mb-4">Berikan penilaian Anda untuk meningkatkan layanan kami</p>
                <a href="{{ url('/hasil_skm') }}" class="btn btn-warning rounded-pill px-4 py-2">
                  Isi Survei <i class="fa fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Layanan Pengaduan -->
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100">
            <div class="service-img rounded-top">
              <img src="{{ asset('assets/img/ruang_rapat.jpeg') }}" class="img-fluid w-100 rounded-top" alt="Pengaduan">
            </div>
            <div class="service-content rounded-bottom bg-light p-4">
              <div class="service-content-inner">
                <div class="d-flex align-items-center mb-3">
                  <div class="service-icon p-3 border border-primary bg-white rounded-circle me-3">
                    <i class="fa fa-comments text-primary fa-2x"></i>
                  </div>
                  <h5 class="mb-0">Layanan Pengaduan</h5>
                </div>
                <p class="mb-4">Sampaikan kritik, saran, atau keluhan Anda kepada kami</p>
                <a href="{{ url('/layanan_pengaduan') }}" class="btn btn-primary rounded-pill px-4 py-2">
                  Kirim Pengaduan <i class="fa fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Denah Fasilitas -->
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100">
            <div class="service-img rounded-top">
              <img src="{{ asset('assets/img/terminal-bus-cilacap-2.jpg') }}" class="img-fluid w-100 rounded-top" alt="Fasilitas">
            </div>
            <div class="service-content rounded-bottom bg-light p-4">
              <div class="service-content-inner">
                <div class="d-flex align-items-center mb-3">
                  <div class="service-icon p-3 border border-warning bg-white rounded-circle me-3">
                    <i class="fa fa-map text-warning fa-2x"></i>
                  </div>
                  <h5 class="mb-0">Denah Fasilitas</h5>
                </div>
                <p class="mb-4">Lihat denah lengkap fasilitas yang tersedia di terminal</p>
                <a href="{{ url('/fasilitas') }}" class="btn btn-warning rounded-pill px-4 py-2">
                  Lihat Denah <i class="fa fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Layanan End -->

</body>
@endsection