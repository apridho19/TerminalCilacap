<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0">
    <nav
        class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h4 class="display-10 text-primary m-0">
                <img
                    src="{{ asset('assets/img/logo_kemenhub.png') }}"
                    class="img-fluid"
                    alt="logo" />Terminal BMD Cilacap
            </h4>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Profile</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/kilas_balik') }}" class="dropdown-item">Kilas Balik</a>
                        <a href="{{ url('/visi_misi') }}" class="dropdown-item">Visi Misi</a>
                        <a href="{{ url('/struktur_organisasi') }}" class="dropdown-item">Struktur Organisasi</a>
                        <a href="{{ url('/fasilitas') }}" class="dropdown-item">Fasilitas</a>
                    </div>
                </div>
                <!-- <a href="service.html" class="nav-item nav-link">Layanan</a> -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown"><span class="dropdown-toggle">Layanan</span></a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/maklumat') }}" class="dropdown-item">Maklumat</a>
                        <a href="{{ url('/tarif_tiket') }}" class="dropdown-item">Tarif Tiket</a>
                        <a href="{{ url('/daftar_po') }}" class="dropdown-item">Daftar PO BUS</a>
                        <a href="{{ url('/hasil_skm') }}" class="dropdown-item">Hasil SKM</a>
                        <a href="{{ url('/layanan_pengaduan') }}" class="dropdown-item">Layanan Pengaduan</a>
                    </div>
                </div>
                <a href="" class="nav-item nav-link">Kegiatan</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Informasi</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="berita.html" class="dropdown-item">Berita</a>
                        <a href="peraturan-perundangan.html" class="dropdown-item">
                            Peraturan perundang-undangan
                        </a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="tempat-wisata.html" class="dropdown-item">Tempat Wisata</a>
                        <a href="restoran.html" class="dropdown-item">Restoran</a>
                    </div>
                </div>
                <a
                    href="contact.html"
                    class="nav-item nav-link px-lg-3 mb-3 mb-md-3 mb-lg-0">Kontak</a>
            </div>
            <!-- <button
            class="btn btn-primary btn-md-square border-warning mb-3 mb-md-3 mb-lg-0 me-3"
            data-bs-toggle="modal"
            data-bs-target="#searchModal"
          >
            <i class="fas fa-search"></i>
          </button>
          <a
            href=""
            class="btn btn-primary border-warning rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"
            >Get A Quote</a
          > -->
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->