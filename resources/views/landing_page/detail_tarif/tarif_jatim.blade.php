@extends('landing_page.layouts.main')

@section('content')

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-warning"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->


    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px">
        <h3
          class="text-white display-3 mb-4 wow fadeInDown"
          data-wow-delay="0.1s"
        >
          Tarif Tiket ke Jawa Timur
        </h3>
        <nav aria-label="breadcrumb">
          <ol
            class="breadcrumb justify-content-center mb-0 wow fadeInDown"
            data-wow-delay="0.3s"
          >
            <li class="breadcrumb-item">
              <a href="{{url('/index')}}" class="text-white">Beranda</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{url('/tarif_tiket')}}" class="text-white">Tarif Tiket</a>
            </li>
            <li class="breadcrumb-item active text-warning">Jawa Timur</li>
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
          data-wow-delay="0.1s"
        >
          <div class="sub-style">
            <h5 class="sub-title text-primary px-3">Tarif Bus ke Jawa Timur</h5>
          </div>
          <h1 class="display-5 mb-4">Daftar Tarif Tiket ke Jawa Timur</h1>
          <p class="mb-0">
            Terminal BMD Cilacap menyediakan layanan bus ke berbagai wilayah di
            Jawa Timur dengan jadwal yang fleksibel
          </p>
        </div>

        <!-- Navigation Links -->
        <div class="text-center mb-4 wow fadeInUp" data-wow-delay="0.2s">
          <a
            href="{{url('/tarif_tiket')}}"
            class="btn btn-outline-primary border-warning rounded-pill px-4 py-2 me-3"
          >
            <i class="fas fa-list me-2"></i>Semua Provinsi
          </a>
        </div>

        <!-- Tabel Tarif Jakarta -->
        <div class="card border-0 shadow-lg wow fadeInUp" data-wow-delay="0.3s">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
              <i class="fas fa-building me-2"></i>Tarif Tiket Bus ke Jawa Timur
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
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>JEMBER</td>
                    <td>Rp290.000,00</td>
                    <td>14:00 / 18:30</td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>HANDOYO</td>
                    <td>EKSEKUTIF</td>
                    <td>JOMBANG</td>
                    <td>Rp185.000,00</td>
                    <td>13:00 / 13:00</td>
                    <td>085747236596</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>JOMBANG</td>
                    <td>Rp200.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>HANDOYO</td>
                    <td>EKSEKUTIF</td>
                    <td>KEJAPANAN</td>
                    <td>Rp185.000,00</td>
                    <td>13:00 / 13:00</td>
                    <td>085747236596</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>KEJAPANAN</td>
                    <td>Rp230.000,00</td>
                    <td>14:00 / 18:30</td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>HANDOYO</td>
                    <td>EKSEKUTIF</td>
                    <td>KERTOSONO</td>
                    <td>Rp185.000,00</td>
                    <td>13:00 / 13:00</td>
                    <td>085747236596</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>KERTOSONO</td>
                    <td>Rp195.000,00</td>
                    <td>06:30 / 08:00 / 15:00 / 17:00 / 18:30</td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>MADIUN</td>
                    <td>Rp180.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>HANDOYO</td>
                    <td>EKSEKUTIF</td>
                    <td>MALANG</td>
                    <td>Rp185.000,00</td>
                    <td>13:00 / 13:00</td>
                    <td>085747236596</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>MALANG</td>
                    <td>Rp300.000,00</td>
                    <td>07:00 / 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>HANDOYO</td>
                    <td>EKSEKUTIF</td>
                    <td>MOJOKERTO</td>
                    <td>Rp185.000,00</td>
                    <td>13:00 / 13:00</td>
                    <td>085747236596</td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>MOJOKERTO</td>
                    <td>Rp200.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>MOJOKERTO</td>
                    <td>Rp200.000,00</td>
                    <td>14:00 / 18:30</td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>HANDOYO</td>
                    <td>EKSEKUTIF</td>
                    <td>NGANJUK</td>
                    <td>Rp185.000,00</td>
                    <td>13:00 / 13:00</td>
                    <td>085747236596</td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>NGANJUK</td>
                    <td>Rp190.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>NGAWI</td>
                    <td>Rp155.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>17</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>PROBOLINGGO</td>
                    <td>Rp265.000,00</td>
                    <td>14:00 / 18:30</td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>18</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>SURABAYA</td>
                    <td>Rp200.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>19</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>SURABAYA</td>
                    <td>Rp200.000,00</td>
                    <td>06:30 / 08:00 / 15:00 / 17:00 / 18:30</td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>SURABAYA</td>
                    <td>Rp300.000,00</td>
                    <td>07:00 / 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>SRAGEN</td>
                    <td>Rp140.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
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
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"
      ><i class="fa fa-arrow-up"></i
    ></a>
  </body>
@endsection
