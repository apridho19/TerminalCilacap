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
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Visi Misi</h1>
                <!-- <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-warning">About</li>
                </ol>     -->
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light rounded">
                        <img src="{{ asset('assets/img/about-2.png') }}" class="img-fluid w-100" style="margin-bottom: -7px;" alt="Image">
                        <img src="{{ asset('assets/img/about-3.jpg') }}" class="img-fluid w-100 border-bottom border-5 border-primary" style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image">
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h5 class="sub-title pe-3">Visi Misi</h5>
                    <h1 class="display-5 mb-4">Tentang Kami - <br> Terminal Tipe A Bangga Mbangun Desa Cilacap </h1>
                    <p class="mb-4">VISI
                        <br><br>Pengelola Transportasi Darat Yang Handal, Berdaya Saing, Dan Memberikan Nilai Tambah Serta Terwujudnya Indonesia Maju Yang Berdaulat, Mandiri, Dan Berkepribadian, Berlandaskan Gotong-Royong.
                        <br><br>
                        Misi
                        <br><br>
                        Menciptakan sistem pelayanan transportasi darat yang aman, selamat, dan mampu menjangkau masyarakat dan wilayah Indonesia.
                        Menciptakan dan mengorganisasikan transportasi darat, sungai, danau dan penyeberangan serta perkotaan yang berkualitas, berdaya saing dan berkelanjutan.
                        Mendorong berkembangnya industri transportasi darat yang transparan dan akuntabel.
                        Membangun prasarana dan sarana transportasi darat.
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

</body>
@endsection