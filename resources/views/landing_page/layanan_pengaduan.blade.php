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
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Layanan Pengaduan</h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- Form Pengaduan Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Info Section -->
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-primary rounded p-5 h-100">
                        <div class="text-center mb-4">
                            <i class="fas fa-comments fa-3x text-white mb-3"></i>
                            <h3 class="text-white mb-4">Form Pengaduan</h3>
                        </div>
                        <p class="text-white mb-4">
                            Kami berkomitmen untuk memberikan pelayanan terbaik. Masukan Anda sangat berharga untuk peningkatan kualitas layanan kami.
                        </p>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning rounded-circle me-3 d-flex align-items-center justify-content-center" style="min-width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fa fa-clock text-white" style="font-size: 22px;"></i>
                            </div>
                            <div>
                                <p class="text-white mb-0" style="font-size: 15px; line-height: 1.5;">Kami akan merespon pengaduan Anda maksimal dalam 24 jam</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning rounded-circle me-3 d-flex align-items-center justify-content-center" style="min-width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fa fa-lock text-white" style="font-size: 22px;"></i>
                            </div>
                            <div>
                                <p class="text-white mb-0" style="font-size: 15px; line-height: 1.5;">Data Anda akan dijaga kerahasiaannya</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning rounded-circle me-3 d-flex align-items-center justify-content-center" style="min-width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fa fa-user-tie text-white" style="font-size: 22px;"></i>
                            </div>
                            <div>
                                <p class="text-white mb-0" style="font-size: 15px; line-height: 1.5;">Ditangani oleh tim yang berpengalaman</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-warning rounded-circle me-3 d-flex align-items-center justify-content-center" style="min-width: 50px; height: 50px; flex-shrink: 0;">
                                <i class="fa fa-lightbulb text-white" style="font-size: 22px;"></i>
                            </div>
                            <div>
                                <p class="text-white mb-0" style="font-size: 15px; line-height: 1.5;">Kami akan memberikan solusi terbaik untuk masalah Anda</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="bg-light rounded p-5">
                        <h4 class="text-primary mb-4">
                            <i class="fa fa-edit me-2"></i>Sampaikan Pengaduan Anda
                        </h4>
                        <p class="mb-4">Sampaikan kritik, saran, atau keluhan Anda kepada kami</p>

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route('pengaduan.store') }}" method="POST" id="formPengaduan">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="nama" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                                        <label for="nama"><i class="fa fa-user text-primary me-2"></i>Nama Lengkap <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                        <label for="email"><i class="fa fa-envelope text-primary me-2"></i>Email</label>
                                        <small class="text-muted">Opsional - untuk konfirmasi balasan</small>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control border-0" id="telepon" name="telepon" placeholder="No. Telepon" value="{{ old('telepon') }}">
                                        <label for="telepon"><i class="fa fa-phone text-primary me-2"></i>No. Telepon</label>
                                        <small class="text-muted">Opsional - untuk dihubungi kembali</small>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <select class="form-control border-0" id="jenis_pengaduan" name="jenis_pengaduan" required>
                                            <option value="">-- Pilih Jenis Pengaduan --</option>
                                            <option value="Kritik" {{ old('jenis_pengaduan') == 'Kritik' ? 'selected' : '' }}>Kritik</option>
                                            <option value="Saran" {{ old('jenis_pengaduan') == 'Saran' ? 'selected' : '' }}>Saran</option>
                                            <option value="Keluhan" {{ old('jenis_pengaduan') == 'Keluhan' ? 'selected' : '' }}>Keluhan</option>
                                            <option value="Pertanyaan" {{ old('jenis_pengaduan') == 'Pertanyaan' ? 'selected' : '' }}>Pertanyaan</option>
                                        </select>
                                        <label for="jenis_pengaduan"><i class="fa fa-list text-primary me-2"></i>Jenis Pengaduan <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Isi Pengaduan" id="isi_pengaduan" name="isi_pengaduan" style="height: 200px" required>{{ old('isi_pengaduan') }}</textarea>
                                        <label for="isi_pengaduan"><i class="fa fa-comment text-primary me-2"></i>Tulis kritik, saran, atau keluhan Anda di sini... <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="text-end mt-1">
                                        <small class="text-muted"><span id="charCount">0</span> / 1000 karakter</small>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button class="btn btn-primary w-100 py-3 rounded-pill" type="submit">
                                        <i class="fa fa-paper-plane me-2"></i>Kirim Pengaduan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Pengaduan End -->
    </a>




    <!-- Back to Top -->

    <script>
        // Character counter untuk textarea
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('isi_pengaduan');
            const charCount = document.getElementById('charCount');
            const maxLength = 1000;

            if (textarea && charCount) {
                textarea.addEventListener('input', function() {
                    const currentLength = this.value.length;
                    charCount.textContent = currentLength + '/' + maxLength + ' karakter';

                    // Ubah warna jika mendekati batas
                    if (currentLength >= maxLength) {
                        charCount.classList.add('text-danger');
                        charCount.classList.remove('text-muted');
                    } else if (currentLength >= maxLength * 0.9) {
                        charCount.classList.add('text-warning');
                        charCount.classList.remove('text-muted', 'text-danger');
                    } else {
                        charCount.classList.add('text-muted');
                        charCount.classList.remove('text-warning', 'text-danger');
                    }
                });
            }
        });
    </script>
    @endsection