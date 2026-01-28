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

  <!-- Training Start -->
  <div class="container-fluid training overflow-hidden bg-light py-5">
    <div class="container py-5">
      <div
        class="section-title text-center mb-5 wow fadeInUp"
        data-wow-delay="0.1s">
        <div class="sub-style">
          <h5 class="sub-title text-primary px-3">FASILITAS KAMI</h5>
        </div>
        <h1 class="display-5 mb-4">
          Terminal Tipe A Bangga Mbangun Desa Cilacap jaya jaya jaya
        </h1>
        <p class="mb-0">
          Bagi penumpang, terminal menjadi tempat untuk mendapatkan pilihan
          berbagai angkutan umum yang tersedia. Penumpang juga membutuhkan
          fasilitas informasi, fasilitas prasarana dan fasilitas keamanan
          sehingga membuat rasa aman dan nyaman.
        </p>
      </div>
      <div class="row g-4">
        <div
          class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp"
          data-wow-delay="0.1s">
          <div class="training-item">
            <div class="training-inner">
              <img
                src="{{ asset('assets/img/training-1.jpg') }}"
                class="img-fluid w-100 rounded"
                alt="Image" />
              <div class="training-title-name">
                <a href="#" class="h4 text-white mb-0">Ruang </a>
                <a href="#" class="h4 text-white mb-0">Tunggu</a>
              </div>
            </div>
            <div class="training-content rounded-bottom p-4">
              <a href="#">
                <h4 class="text-white">IELTS Coaching</h4>
              </a>
              <p class="text-white-50">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Autem, veritatis.
              </p>
              <!-- <a class="btn btn-warning rounded-pill text-white p-0" href="#"
                  >Read More <i class="fa fa-arrow-right"></i
                ></a> -->
            </div>
          </div>
        </div>
        <div
          class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp"
          data-wow-delay="0.3s">
          <div class="training-item">
            <div class="training-inner">
              <img
                src="{{ asset('assets/img/training-2.jpg') }}"
                class="img-fluid w-100 rounded"
                alt="Image" />
              <div class="training-title-name">
                <a href="#" class="h4 text-white mb-0">TOEFL</a>
                <a href="#" class="h4 text-white mb-0">Coaching</a>
              </div>
            </div>
            <div class="training-content rounded-bottom p-4">
              <a href="#">
                <h4 class="text-white">TOEFL Coaching</h4>
              </a>
              <p class="text-white-50">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Autem, veritatis.
              </p>
              <!-- <a class="btn btn-warning rounded-pill text-white p-0" href="#"
                  >Read More <i class="fa fa-arrow-right"></i
                ></a> -->
            </div>
          </div>
        </div>
        <div
          class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp"
          data-wow-delay="0.5s">
          <div class="training-item">
            <div class="training-inner">
              <img
                src="{{ asset('assets/img/training-3.jpg') }}"
                class="img-fluid w-100 rounded"
                alt="Image" />
              <div class="training-title-name">
                <a href="#" class="h4 text-white mb-0">PTE</a>
                <a href="#" class="h4 text-white mb-0">Coaching</a>
              </div>
            </div>
            <div class="training-content rounded-bottom p-4">
              <a href="#">
                <h4 class="text-white">PTE Coaching</h4>
              </a>
              <p class="text-white-50">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Autem, veritatis.
              </p>
              <!-- <a class="btn btn-warning rounded-pill text-white p-0" href="#"
                  >Read More <i class="fa fa-arrow-right"></i
                ></a> -->
            </div>
          </div>
        </div>
        <div
          class="col-lg-6 col-lg-6 col-xl-3 wow fadeInUp"
          data-wow-delay="0.7s">
          <div class="training-item">
            <div class="training-inner">
              <img
                src="{{ asset('assets/img/training-4.jpg') }}"
                class="img-fluid w-100 rounded"
                alt="Image" />
              <div class="training-title-name">
                <a href="#" class="h4 text-white mb-0">OET</a>
                <a href="#" class="h4 text-white mb-0">Coaching</a>
              </div>
            </div>
            <div class="training-content rounded-bottom p-4">
              <a href="#">
                <h4 class="text-white">OET Coaching</h4>
              </a>
              <p class="text-white-50">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Autem, veritatis.
              </p>
              <!-- <a class="btn btn-warning rounded-pill text-white p-0" href="#"
                  >Read More <i class="fa fa-arrow-right"></i
                ></a> -->
            </div>
          </div>
        </div>
        <div class="col-12 text-center">
          <a
            class="btn btn-primary border-warning rounded-pill py-3 px-5 wow fadeInUp"
            data-wow-delay="0.1s"
            href="#">View More</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Training End -->

  <!-- Features Start -->
  <!-- <div class="container-fluid features overflow-hidden py-5">
      <div class="container">
        <div
          class="section-title text-center mb-5 wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="sub-style">
            <h5 class="sub-title text-primary px-3">Why Choose Us</h5>
          </div>
          <h1 class="display-5 mb-4">
            Offer Tailor Made Services That Our Client Requires
          </h1>
          <p class="mb-0">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat
            deleniti amet at atque sequi quibusdam cumque itaque repudiandae
            temporibus, eius nam mollitia voluptas maxime veniam necessitatibus
            saepe in ab? Repellat!
          </p>
        </div>
        <div class="row g-4 justify-content-center text-center">
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <div class="feature-item text-center p-4">
              <div class="feature-icon p-3 mb-4">
                <i class="fas fa-dollar-sign fa-4x text-primary"></i>
              </div>
              <div class="feature-content d-flex flex-column">
                <h5 class="mb-3">Cost-Effective</h5>
                <p class="mb-3">
                  Dolor, sit amet consectetur adipisicing elit. Soluta inventore
                  cum accusamus,
                </p>
                <a class="btn btn-warning rounded-pill" href="#"
                  >Read More<i class="fas fa-arrow-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.3s"
          >
            <div class="feature-item text-center p-4">
              <div class="feature-icon p-3 mb-4">
                <i class="fab fa-cc-visa fa-4x text-primary"></i>
              </div>
              <div class="feature-content d-flex flex-column">
                <h5 class="mb-3">Visa Assistance</h5>
                <p class="mb-3">
                  Dolor, sit amet consectetur adipisicing elit. Soluta inventore
                  cum accusamus,
                </p>
                <a class="btn btn-warning rounded-pill" href="#"
                  >Read More<i class="fas fa-arrow-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.5s"
          >
            <div class="feature-item text-center p-4">
              <div class="feature-icon p-3 mb-4">
                <i class="fas fa-atlas fa-4x text-primary"></i>
              </div>
              <div class="feature-content d-flex flex-column">
                <h5 class="mb-3">Faster Processing</h5>
                <p class="mb-3">
                  Dolor, sit amet consectetur adipisicing elit. Soluta inventore
                  cum accusamus,
                </p>
                <a class="btn btn-warning rounded-pill" href="#"
                  >Read More<i class="fas fa-arrow-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.7s"
          >
            <div class="feature-item text-center p-4">
              <div class="feature-icon p-3 mb-4">
                <i class="fas fa-users fa-4x text-primary"></i>
              </div>
              <div class="feature-content d-flex flex-column">
                <h5 class="mb-3">Direct Interviews</h5>
                <p class="mb-3">
                  Dolor, sit amet consectetur adipisicing elit. Soluta inventore
                  cum accusamus,
                </p>
                <a class="btn btn-warning rounded-pill" href="#"
                  >Read More<i class="fas fa-arrow-right ms-2"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-12">
            <a
              class="btn btn-primary border-warning rounded-pill py-3 px-5 wow fadeInUp"
              data-wow-delay="0.1s"
              href="#"
              >More Features</a
            >
          </div>
        </div>
      </div>
    </div> -->
  <!-- Features End -->

  <!-- Counter Facts Start -->
  <!-- <div class="container-fluid counter-facts py-5">
      <div class="container py-5">
        <div class="row g-4">
          <div
            class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <div class="counter">
              <div class="counter-icon">
                <i class="fas fa-passport"></i>
              </div>
              <div class="counter-content">
                <h3>Visa Categories</h3>
                <div class="d-flex align-items-center justify-content-center">
                  <span class="counter-value" data-toggle="counter-up">31</span>
                  <h4
                    class="text-warning mb-0"
                    style="font-weight: 600; font-size: 25px"
                  >
                    +
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.3s"
          >
            <div class="counter">
              <div class="counter-icon">
                <i class="fas fa-users"></i>
              </div>
              <div class="counter-content">
                <h3>Team Members</h3>
                <div class="d-flex align-items-center justify-content-center">
                  <span class="counter-value" data-toggle="counter-up"
                    >377</span
                  >
                  <h4
                    class="text-warning mb-0"
                    style="font-weight: 600; font-size: 25px"
                  >
                    +
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.5s"
          >
            <div class="counter">
              <div class="counter-icon">
                <i class="fas fa-user-check"></i>
              </div>
              <div class="counter-content">
                <h3>Visa Process</h3>
                <div class="d-flex align-items-center justify-content-center">
                  <span class="counter-value" data-toggle="counter-up"
                    >4.9</span
                  >
                  <h4
                    class="text-warning mb-0"
                    style="font-weight: 600; font-size: 25px"
                  >
                    K
                  </h4>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-12 col-sm-6 col-md-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.7s"
          >
            <div class="counter">
              <div class="counter-icon">
                <i class="fas fa-handshake"></i>
              </div>
              <div class="counter-content">
                <h3>Success Rates</h3>
                <div class="d-flex align-items-center justify-content-center">
                  <span class="counter-value" data-toggle="counter-up">98</span>
                  <h4
                    class="text-warning mb-0"
                    style="font-weight: 600; font-size: 25px"
                  >
                    %
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  <!-- Counter Facts End -->

  <!-- Services Start -->
  <!-- <div class="container-fluid service overflow-hidden pt-5">
      <div class="container py-5">
        <div
          class="section-title text-center mb-5 wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="sub-style">
            <h5 class="sub-title text-primary px-3">Visa Categories</h5>
          </div>
          <h1 class="display-5 mb-4">Enabling Your Immigration Successfully</h1>
          <p class="mb-0">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat
            deleniti amet at atque sequi quibusdam cumque itaque repudiandae
            temporibus, eius nam mollitia voluptas maxime veniam necessitatibus
            saepe in ab? Repellat!
          </p>
        </div>
        <div class="row g-4">
          <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item">
              <div class="service-inner">
                <div class="service-img">
                  <img
                    src="img/service-1.jpg"
                    class="img-fluid w-100 rounded"
                    alt="Image"
                  />
                </div>
                <div class="service-title">
                  <div class="service-title-name">
                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                      <a href="#" class="h4 text-white mb-0">Job Visa</a>
                    </div>
                    <a
                      class="btn bg-light text-warning rounded-pill py-3 px-5 mb-4"
                      href="#"
                      >Explore More</a
                    >
                  </div>
                  <div class="service-content pb-4">
                    <a href="#"
                      ><h4 class="text-white mb-4 py-3">Job Visa</h4></a
                    >
                    <div class="px-4">
                      <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Mollitia fugit dolores nesciunt adipisci obcaecati
                        veritatis cum, ratione aspernatur autem velit.
                      </p>
                      <a
                        class="btn btn-primary border-warning rounded-pill py-3 px-5"
                        href="#"
                        >Explore More</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item">
              <div class="service-inner">
                <div class="service-img">
                  <img
                    src="img/service-2.jpg"
                    class="img-fluid w-100 rounded"
                    alt="Image"
                  />
                </div>
                <div class="service-title">
                  <div class="service-title-name">
                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                      <a href="#" class="h4 text-white mb-0">Business Visa</a>
                    </div>
                    <a
                      class="btn bg-light text-warning rounded-pill py-3 px-5 mb-4"
                      href="#"
                      >Explore More</a
                    >
                  </div>
                  <div class="service-content pb-4">
                    <a href="#"
                      ><h4 class="text-white mb-4 py-3">Business Visa</h4></a
                    >
                    <div class="px-4">
                      <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Mollitia fugit dolores nesciunt adipisci obcaecati
                        veritatis cum, ratione aspernatur autem velit.
                      </p>
                      <a
                        class="btn btn-primary border-warning rounded-pill text-white py-3 px-5"
                        href="#"
                        >Explore More</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item">
              <div class="service-inner">
                <div class="service-img">
                  <img
                    src="img/service-3.jpg"
                    class="img-fluid w-100 rounded"
                    alt="Image"
                  />
                </div>
                <div class="service-title">
                  <div class="service-title-name">
                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                      <a href="#" class="h4 text-white mb-0">Diplometic Visa</a>
                    </div>
                    <a
                      class="btn bg-light text-warning rounded-pill py-3 px-5 mb-4"
                      href="#"
                      >Explore More</a
                    >
                  </div>
                  <div class="service-content pb-4">
                    <a href="#"
                      ><h4 class="text-white mb-4 py-3">Diplometic Visa</h4></a
                    >
                    <div class="px-4">
                      <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Mollitia fugit dolores nesciunt adipisci obcaecati
                        veritatis cum, ratione aspernatur autem velit.
                      </p>
                      <a
                        class="btn btn-primary border-warning rounded-pill text-white py-3 px-5"
                        href="#"
                        >Explore More</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item">
              <div class="service-inner">
                <div class="service-img">
                  <img
                    src="img/service-1.jpg"
                    class="img-fluid w-100 rounded"
                    alt="Image"
                  />
                </div>
                <div class="service-title">
                  <div class="service-title-name">
                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                      <a href="#" class="h4 text-white mb-0">Students Visa</a>
                    </div>
                    <a
                      class="btn bg-light text-warning rounded-pill py-3 px-5 mb-4"
                      href="#"
                      >Explore More</a
                    >
                  </div>
                  <div class="service-content pb-4">
                    <a href="#"
                      ><h4 class="text-white mb-4 py-3">Students Visa</h4></a
                    >
                    <div class="px-4">
                      <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Mollitia fugit dolores nesciunt adipisci obcaecati
                        veritatis cum, ratione aspernatur autem velit.
                      </p>
                      <a
                        class="btn btn-primary border-warning rounded-pill text-white py-3 px-5"
                        href="#"
                        >Explore More</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item">
              <div class="service-inner">
                <div class="service-img">
                  <img
                    src="img/service-2.jpg"
                    class="img-fluid w-100 rounded"
                    alt="Image"
                  />
                </div>
                <div class="service-title">
                  <div class="service-title-name">
                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                      <a href="#" class="h4 text-white mb-0">Residence Visa</a>
                    </div>
                    <a
                      class="btn bg-light text-warning rounded-pill py-3 px-5 mb-4"
                      href="#"
                      >Explore More</a
                    >
                  </div>
                  <div class="service-content pb-4">
                    <a href="#"
                      ><h4 class="text-white mb-4 py-3">Residence Visa</h4></a
                    >
                    <div class="px-4">
                      <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Mollitia fugit dolores nesciunt adipisci obcaecati
                        veritatis cum, ratione aspernatur autem velit.
                      </p>
                      <a
                        class="btn btn-primary border-warning rounded-pill text-white py-3 px-5"
                        href="#"
                        >Explore More</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item">
              <div class="service-inner">
                <div class="service-img">
                  <img
                    src="img/service-3.jpg"
                    class="img-fluid w-100 rounded"
                    alt="Image"
                  />
                </div>
                <div class="service-title">
                  <div class="service-title-name">
                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                      <a href="#" class="h4 text-white mb-0">Tourist Visa</a>
                    </div>
                    <a
                      class="btn bg-light text-warning rounded-pill py-3 px-5 mb-4"
                      href="#"
                      >Explore More</a
                    >
                  </div>
                  <div class="service-content pb-4">
                    <a href="#"
                      ><h4 class="text-white mb-4 py-3">Tourist Visa</h4></a
                    >
                    <div class="px-4">
                      <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Mollitia fugit dolores nesciunt adipisci obcaecati
                        veritatis cum, ratione aspernatur autem velit.
                      </p>
                      <a
                        class="btn btn-primary border-warning rounded-pill text-white py-3 px-5"
                        href="#"
                        >Explore More</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  <!-- Services End -->

  <!-- Countries We Offer Start -->
  <!-- <div class="container-fluid country overflow-hidden py-5">
      <div class="container">
        <div
          class="section-title text-center wow fadeInUp"
          data-wow-delay="0.1s"
          style="margin-bottom: 70px"
        >
          <div class="sub-style">
            <h5 class="sub-title text-primary px-3">COUNTRIES WE OFFER</h5>
          </div>
          <h1 class="display-5 mb-4">
            Immigration & visa services following Countries
          </h1>
          <p class="mb-0">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat
            deleniti amet at atque sequi quibusdam cumque itaque repudiandae
            temporibus, eius nam mollitia voluptas maxime veniam necessitatibus
            saepe in ab? Repellat!
          </p>
        </div>
        <div class="row g-4 text-center">
          <div
            class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <div class="country-item">
              <div class="rounded overflow-hidden">
                <img
                  src="img/country-1.jpg"
                  class="img-fluid w-100 rounded"
                  alt="Image"
                />
              </div>
              <div class="country-flag">
                <img
                  src="img/brazil.jpg"
                  class="img-fluid rounded-circle"
                  alt="Image"
                />
              </div>
              <div class="country-name">
                <a href="#" class="text-white fs-4">Brazil</a>
              </div>
            </div>
          </div>
          <div
            class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp"
            data-wow-delay="0.3s"
          >
            <div class="country-item">
              <div class="rounded overflow-hidden">
                <img
                  src="img/country-2.jpg"
                  class="img-fluid w-100 rounded"
                  alt="Image"
                />
              </div>
              <div class="country-flag">
                <img
                  src="img/india.jpg"
                  class="img-fluid rounded-circle"
                  alt="Image"
                />
              </div>
              <div class="country-name">
                <a href="#" class="text-white fs-4">india</a>
              </div>
            </div>
          </div>
          <div
            class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp"
            data-wow-delay="0.5s"
          >
            <div class="country-item">
              <div class="rounded overflow-hidden">
                <img
                  src="img/country-3.jpg"
                  class="img-fluid w-100 rounded"
                  alt="Image"
                />
              </div>
              <div class="country-flag">
                <img
                  src="img/usa.jpg"
                  class="img-fluid rounded-circle"
                  alt="Image"
                />
              </div>
              <div class="country-name">
                <a href="#" class="text-white fs-4">New York</a>
              </div>
            </div>
          </div>
          <div
            class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp"
            data-wow-delay="0.7s"
          >
            <div class="country-item">
              <div class="rounded overflow-hidden">
                <img
                  src="img/country-4.jpg"
                  class="img-fluid w-100 rounded"
                  alt="Image"
                />
              </div>
              <div class="country-flag">
                <img
                  src="img/italy.jpg"
                  class="img-fluid rounded-circle"
                  alt="Image"
                />
              </div>
              <div class="country-name">
                <a href="#" class="text-white fs-4">Italy</a>
              </div>
            </div>
          </div>
          <div class="col-12">
            <a
              class="btn btn-primary border-warning rounded-pill py-3 px-5 wow fadeInUp"
              data-wow-delay="0.1s"
              href="#"
              >More Countries</a
            >
          </div>
        </div>
      </div>
    </div> -->
  <!-- Countries We Offer End -->

  <!-- Testimonial Start -->
  <div class="container-fluid testimonial overflow-hidden pb-5">
    <div class="container py-5">
      <div
        class="section-title text-center mb-5 wow fadeInUp"
        data-wow-delay="0.1s">
        <div class="sub-style">
          <h5 class="sub-title text-primary px-3">OUR CLIENTS RIVIEWS</h5>
        </div>
        <h1 class="display-5 mb-4">What Our Clients Say</h1>
        <p class="mb-0">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat
          deleniti amet at atque sequi quibusdam cumque itaque repudiandae
          temporibus, eius nam mollitia voluptas maxime veniam necessitatibus
          saepe in ab? Repellat!
        </p>
      </div>
      <div
        class="owl-carousel testimonial-carousel wow zoomInDown"
        data-wow-delay="0.2s">
        <div class="testimonial-item">
          <div class="testimonial-content p-4 mb-5">
            <p class="fs-5 mb-0">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitati eiusmod tempor
              incididunt.
            </p>
            <div class="d-flex justify-content-end">
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
            </div>
          </div>
          <div class="d-flex">
            <div
              class="rounded-circle me-4"
              style="width: 100px; height: 100px">
              <img
                class="img-fluid rounded-circle"
                src="{{ asset('assets/img/testimonial-1.jpg') }}"
                alt="img" />
            </div>
            <div class="my-auto">
              <h5>Person Name</h5>
              <p class="mb-0">Profession</p>
            </div>
          </div>
        </div>
        <div class="testimonial-item">
          <div class="testimonial-content p-4 mb-5">
            <p class="fs-5 mb-0">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitati eiusmod tempor
              incididunt.
            </p>
            <div class="d-flex justify-content-end">
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
            </div>
          </div>
          <div class="d-flex">
            <div
              class="rounded-circle me-4"
              style="width: 100px; height: 100px">
              <img
                class="img-fluid rounded-circle"
                src="{{ asset('assets/img/testimonial-2.jpg') }}"
                alt="img" />
            </div>
            <div class="my-auto">
              <h5>Person Name</h5>
              <p class="mb-0">Profession</p>
            </div>
          </div>
        </div>
        <div class="testimonial-item">
          <div class="testimonial-content p-4 mb-5">
            <p class="fs-5 mb-0">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitati eiusmod tempor
              incididunt.
            </p>
            <div class="d-flex justify-content-end">
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
            </div>
          </div>
          <div class="d-flex">
            <div
              class="rounded-circle me-4"
              style="width: 100px; height: 100px">
              <img
                class="img-fluid rounded-circle"
                src="{{ asset('assets/img/testimonial-3.jpg') }}"
                alt="img" />
            </div>
            <div class="my-auto">
              <h5>Person Name</h5>
              <p class="mb-0">Profession</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->

  <!-- Contact Start -->
  <div class="container-fluid contact overflow-hidden pb-5">
    <div class="container py-5">
      <div class="office pt-5">
        <div
          class="section-title text-center mb-5 wow fadeInUp"
          data-wow-delay="0.1s">
          <div class="sub-style">
            <h5 class="sub-title text-primary px-3">Worlwide Offices</h5>
          </div>
          <h1 class="display-5 mb-4">Explore Our Office Worldwide</h1>
          <p class="mb-0">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat
            deleniti amet at atque sequi quibusdam cumque itaque repudiandae
            temporibus, eius nam mollitia voluptas maxime veniam
            necessitatibus saepe in ab? Repellat!
          </p>
        </div>
        <div class="row g-4 justify-content-center">
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.1s">
            <div class="office-item p-4">
              <div class="office-img mb-4">
                <img
                  src="{{ asset('assets/img/office-2.jpg') }}"
                  class="img-fluid w-100 rounded"
                  alt="" />
              </div>
              <div class="office-content d-flex flex-column">
                <h4 class="mb-2">Australia</h4>
                <a href="#" class="text-warning fs-5 mb-2">+123.456.7890</a>
                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                <p class="mb-0">
                  123, First Floor, 123 St Roots Terrace, Los Angeles 90010
                  Unitd States of America.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.3s">
            <div class="office-item p-4">
              <div class="office-img mb-4">
                <img
                  src="{{ asset('assets/img/office-1.jpg') }}"
                  class="img-fluid w-100 rounded"
                  alt="" />
              </div>
              <div class="office-content d-flex flex-column">
                <h4 class="mb-2">Canada</h4>
                <a href="#" class="text-warning fs-5 mb-2">(012) 0345 6789</a>
                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                <p class="mb-0">
                  123, First Floor, 123 St Roots Terrace, Los Angeles 90010
                  Unitd States of America.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.5s">
            <div class="office-item p-4">
              <div class="office-img mb-4">
                <img
                  src="{{ asset('assets/img/office-3.jpg') }}"
                  class="img-fluid w-100 rounded"
                  alt="" />
              </div>
              <div class="office-content d-flex flex-column">
                <h4 class="mb-2">United Kingdom</h4>
                <a href="#" class="text-warning fs-5 mb-2">01234.567.890</a>
                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                <p class="mb-0">
                  123, First Floor, 123 St Roots Terrace, Los Angeles 90010
                  Unitd States of America.
                </p>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp"
            data-wow-delay="0.7s">
            <div class="office-item p-4">
              <div class="office-img mb-4">
                <img
                  src="{{ asset('assets/img/office-4.jpg') }}"
                  class="img-fluid w-100 rounded"
                  alt="" />
              </div>
              <div class="office-content d-flex flex-column">
                <h4 class="mb-2">India</h4>
                <a href="#" class="text-warning fs-5 mb-2">+123.45.67890</a>
                <a href="#" class="text-muted fs-5 mb-2">travisa@example.com</a>
                <p class="mb-0">
                  123, First Floor, 123 St Roots Terrace, Los Angeles 90010
                  Unitd States of America.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
</body>
@endsection