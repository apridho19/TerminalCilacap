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
                <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Daftar PO Bus</h1>
                <!-- <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-warning">Services</li>
                </ol>     -->
            </div>
        </div>
        <!-- Header End -->

        <!-- Main Content Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style">
                        <h5 class="sub-title text-primary px-3">Daftar PO Bus</h5>
                    </div>
                    <h1 class="display-5 mb-4">Perusahaan Otobus (PO) yang Beroperasi</h1>
                    <p class="mb-0">Berikut adalah daftar lengkap Perusahaan Otobus (PO) yang beroperasi dari Terminal BMD Cilacap beserta kontak agen yang dapat dihubungi.</p>
                </div>

        <!-- Bus Operator Table -->
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="card border-0 shadow-lg wow fadeInUp" data-wow-delay="0.3s">
              <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                  <i class="fas fa-bus me-2"></i>Daftar Perusahaan Otobus (PO)
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mb-0">
                    <thead class="table-warning">
                      <tr class="text-center">
                        <th style="width: 10%">No.</th>
                        <th style="width: 50%">Nama PO Bus</th>
                        <th style="width: 40%">Kontak Agen</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td>DAMRI</td>
                        <td>0895322320525 & 089665561205</td>
                      </tr>
                      <tr>
                        <td class="text-center">2</td>
                        <td>RIYAN</td>
                        <td>085746039370</td>
                      </tr>
                      <tr>
                        <td class="text-center">3</td>
                        <td>HANDOYO</td>
                        <td>085747236596</td>
                      </tr>
                      <tr>
                        <td class="text-center">4</td>
                        <td>EKA</td>
                        <td>0821336403379</td>
                      </tr>
                      <tr>
                        <td class="text-center">5</td>
                        <td>MURNI JAYA</td>
                        <td>081236403379</td>
                      </tr>
                      <tr>
                        <td class="text-center">6</td>
                        <td>DMI</td>
                        <td>08997934600</td>
                      </tr>
                      <tr>
                        <td class="text-center">7</td>
                        <td>SUGENG RAHAYU</td>
                        <td>082313552254</td>
                      </tr>
                      <tr>
                        <td class="text-center">8</td>
                        <td>EFISIENSI</td>
                        <td>087883027400</td>
                      </tr>
                      <tr>
                        <td class="text-center">9</td>
                        <td>SINAR JAYA</td>
                        <td>082216726222</td>
                      </tr>
                      <tr>
                        <td class="text-center">10</td>
                        <td>ARIES</td>
                        <td>085220833770 & 081234250420</td>
                      </tr>
                      <tr>
                        <td class="text-center">11</td>
                        <td>SARI GEDE</td>
                        <td>085877603572</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="row mt-5">
          <div class="col-12 wow fadeInUp" data-wow-delay="0.5s">
            <div class="card border-0 shadow-sm bg-light">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-md-8">
                    <h5 class="card-title text-primary mb-2">
                      <i class="fas fa-info-circle me-2"></i>Informasi Penting
                    </h5>
                    <ul class="list-unstyled mb-0">
                      <li class="mb-1">
                        <i class="fas fa-check text-success me-2"></i>Kontak agen dapat berubah sewaktu-waktu
                      </li>
                      <li class="mb-1">
                        <i class="fas fa-check text-success me-2"></i>Hubungi agen untuk informasi jadwal dan tarif terkini
                      </li>
                      <li class="mb-1">
                        <i class="fas fa-check text-success me-2"></i>Beberapa PO mungkin tidak memiliki agen atau kontak yang tersedia
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4 text-center">
                    <i class="fas fa-phone-alt fa-4x text-primary mb-3"></i>
                    <h6 class="text-primary">Butuh Bantuan?</h6>
                    <p class="text-muted mb-0">Hubungi petugas terminal untuk informasi lebih lanjut</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>
        <!-- Main Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    </body>
    @endsection

