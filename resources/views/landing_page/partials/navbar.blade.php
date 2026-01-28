<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0">
    <nav
        class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h4 class="display-10 text-primary m-0">
                <img
                    src="{{ asset('assets/img/logo_kemenhub.png') }}"
                    class="img-fluid"
                    alt="logo" />     Terminal BMD Cilacap
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
                <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/', 'index') ? 'active' : '' }}">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link {{ Request::is('kilas_balik', 'visi_misi', 'struktur_organisasi', 'fasilitas') ? 'active' : '' }}" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Profile</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/kilas_balik') }}" class="dropdown-item {{ Request::is('kilas_balik') ? 'active' : '' }}">Kilas Balik</a>
                        <a href="{{ url('/visi_misi') }}" class="dropdown-item {{ Request::is('visi_misi') ? 'active' : '' }}">Visi Misi</a>
                        <a href="{{ url('/struktur_organisasi') }}" class="dropdown-item {{ Request::is('struktur_organisasi') ? 'active' : '' }}">Struktur Organisasi</a>
                        <a href="{{ url('/fasilitas') }}" class="dropdown-item {{ Request::is('fasilitas') ? 'active' : '' }}">Fasilitas</a>
                    </div>
                </div>
                <!-- <a href="service.html" class="nav-item nav-link">Layanan</a> -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link {{ Request::is('maklumat', 'tarif_tiket', 'daftar_po', 'hasil_skm', 'layanan_pengaduan') ? 'active' : '' }}" data-bs-toggle="dropdown"><span class="dropdown-toggle">Layanan</span></a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/maklumat') }}" class="dropdown-item {{ Request::is('maklumat') ? 'active' : '' }}">Maklumat</a>
                        <a href="{{ url('/tarif_tiket') }}" class="dropdown-item {{ Request::is('tarif_tiket') ? 'active' : '' }}">Jadwal Keberangkatan</a>
                        <a href="{{ url('/daftar_po') }}" class="dropdown-item {{ Request::is('daftar_po') ? 'active' : '' }}">Daftar PO BUS</a>
                        <a href="{{ url('/hasil_skm') }}" class="dropdown-item {{ Request::is('hasil_skm') ? 'active' : '' }}">Survei Kepuasan Masyarakat</a>
                        <a href="{{ url('/layanan_pengaduan') }}" class="dropdown-item {{ Request::is('layanan_pengaduan') ? 'active' : '' }}">Layanan Pengaduan</a>
                    </div>
                </div>
                <!-- <a href="service.html" class="nav-item nav-link">Informasi</a> -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link {{ Request::is('berita', 'tarif_tiket', 'daftar_po', 'hasil_skm', 'layanan_pengaduan') ? 'active' : '' }}" data-bs-toggle="dropdown"><span class="dropdown-toggle">Berita</span></a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/maklumat') }}" class="dropdown-item {{ Request::is('maklumat') ? 'active' : '' }}">Maklumat</a>
                        <a href="{{ url('/tarif_tiket') }}" class="dropdown-item {{ Request::is('tarif_tiket') ? 'active' : '' }}">Tarif Tiket</a>
                        <a href="{{ url('/daftar_po') }}" class="dropdown-item {{ Request::is('daftar_po') ? 'active' : '' }}">Daftar PO BUS</a>
                        <a href="{{ url('/hasil_skm') }}" class="dropdown-item {{ Request::is('hasil_skm') ? 'active' : '' }}">Hasil SKM</a>
                        <a href="{{ url('/layanan_pengaduan') }}" class="dropdown-item {{ Request::is('layanan_pengaduan') ? 'active' : '' }}">Layanan Pengaduan</a>
                    </div>
                </div>

                <a
                    href="{{ url('/kontak') }}"
                    class="nav-item nav-link px-lg-3 mb-3 mb-md-3 mb-lg-0 {{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
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