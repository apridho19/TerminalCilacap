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
          Tarif Tiket ke Jawa Tengah dan DIY
        </h3>
        <nav aria-label="breadcrumb">
          <ol
            class="breadcrumb justify-content-center mb-0 wow fadeInDown"
            data-wow-delay="0.3s"
          >
            <!-- <li class="breadcrumb-item">
              <a href="{{url('/index')}}" class="text-white">Beranda</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{url('/tarif_tiket')}}" class="text-white">Tarif Tiket</a>
            </li>
            <li class="breadcrumb-item active text-warning">Jawa Tengah</li> -->
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
            <h5 class="sub-title text-primary px-3">
              Tarif Bus ke Jawa Tengah
            </h5>
          </div>
          <h1 class="display-5 mb-4">
            Daftar Tarif Tiket ke Jawa Tengah dan DIY
          </h1>
          <p class="mb-0">
            Terminal BMD Cilacap menyediakan layanan bus ke berbagai wilayah di
            Jawa Tengah dan DIY dengan jadwal yang fleksibel
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
              <i class="fas fa-building me-2"></i>Tarif Tiket Bus ke Jawa Tengah
              dan DIY
            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered mb-0">
                <thead class="table-warning">
                  <tr class="text-center">
                    <th style="width: 5%">No.</th>
                    <th style="width: 15%">Nama PO Bus</th>
                    <th style="width: 15%">Kelas</th>
                    <th style="width: 15%">Tujuan</th>
                    <th style="width: 15%">Harga</th>
                    <th style="width: 23%">Jam Keberangkatan</th>
                    <th style="width: 23%">Nomor Agen</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>BANDARA YIA</td>
                    <td>Rp100.000,00</td>
                    <td>
                      01:00 / 02:00 / 03:00 / 04:00 / 05:00 / 07:00 / 11:00 /
                      12:00 / 13:00 / 14:00 / 15:00 / 16:00 / 19:00<br />06:00 /
                      08:00 / 09:00 / 10:00 / 17:00
                    </td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>RIYAN</td>
                    <td>NON EKONOMI</td>
                    <td>YOGYAKARTA</td>
                    <td>Rp100.000,00</td>
                    <td>
                      01:30 / 07:45 / 08:45 / 09:45 / 12:45 / 13:45 / 15:50 /
                      22:00
                    </td>
                    <td>085746039370</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>RIYAN</td>
                    <td>EKONOMI</td>
                    <td>YOGYAKARTA</td>
                    <td>Rp120.000,00</td>
                    <td>00:50 / 01:50 / 02:50 / 08:50 / 09:25 / 10:05</td>
                    <td>085746039370</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>YOGYAKARTA</td>
                    <td>Rp95.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>YOGYAKARTA</td>
                    <td>Rp95.000,00</td>
                    <td>
                      06:30 / 08:00 / 15:00 / 17:00 / 18:30<br />14:00 / 18:30
                    </td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>YOGYAKARTA</td>
                    <td>Rp100.000,00</td>
                    <td>
                      01:00 / 02:00 / 03:00 / 04:00 / 05:00 / 07:00 / 11:00 /
                      12:00 / 13:00 / 14:00 / 15:00 / 16:00 / 19:00<br />06:00 /
                      08:00 / 09:00 / 10:00 / 17:00 / 01:00
                    </td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>YOGYAKARTA</td>
                    <td>Rp110.000,00</td>
                    <td>07:00 / 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>SEMARANG</td>
                    <td>Rp130.000,00</td>
                    <td>03:00 / 07:00 / 09:00 / 13:00 / 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>SEMARANG</td>
                    <td>Rp160.000,00</td>
                    <td>01:00 / 05:00 / 11:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>SEMARANG</td>
                    <td>Rp150.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>RIYAN</td>
                    <td>EKONOMI</td>
                    <td>SOLO</td>
                    <td>Rp120.000,00</td>
                    <td>00:50 / 01:50 / 02:50 / 08:50 / 09:25 / 10:05</td>
                    <td>085746039370</td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>EKA</td>
                    <td>EKSEKUTIF</td>
                    <td>SOLO</td>
                    <td>Rp105.000,00</td>
                    <td>07:00 / 11:20 / 15:30 / 16:30</td>
                    <td>0821336403379</td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>SOLO</td>
                    <td>Rp105.000,00</td>
                    <td>
                      06:30 / 08:00 / 15:00 / 17:00 / 18:30<br />14:00 / 18:30
                    </td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>SOLO</td>
                    <td>Rp150.000,00</td>
                    <td>07:00 / 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>SOLO</td>
                    <td>Rp130.000,00</td>
                    <td>01:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>SUGENG RAHAYU</td>
                    <td>EKSEKUTIF</td>
                    <td>GOMBONG</td>
                    <td>Rp60.000,00</td>
                    <td>06:30 / 08:00 / 15:00 / 17:00 / 18:30</td>
                    <td>082313552254</td>
                  </tr>
                  <tr>
                    <td>17</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>KEBUMEN</td>
                    <td>Rp60.000,00</td>
                    <td>
                      01:00 / 02:00 / 03:00 / 04:00 / 05:00 / 07:00 / 11:00 /
                      12:00 / 13:00 / 14:00 / 15:00 / 16:00 / 19:00<br />17:00<br />03:00
                      / 07:00 / 09:00 / 13:00 / 15:00<br />01:00
                    </td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>18</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>KEBUMEN</td>
                    <td>Rp70.000,00</td>
                    <td>07:00 / 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>19</td>
                    <td>RIYAN</td>
                    <td>NON EKONOMI</td>
                    <td>PURWOREJO</td>
                    <td>Rp100.000,00</td>
                    <td>
                      01:30, 07:45, 08:45, 09:45, 12:45, 13:45, 15:50, 22:00
                    </td>
                    <td>085746039370</td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>RIYAN</td>
                    <td>EKONOMI</td>
                    <td>PURWOREJO</td>
                    <td>Rp120.000,00</td>
                    <td>00:50, 01:50, 02:50, 08:50, 09:25, 10:05</td>
                    <td>085746039370</td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>PURWOREJO</td>
                    <td>Rp100.000,00</td>
                    <td>
                      01:00, 02:00, 03:00, 04:00, 05:00, 07:00, 11:00, 12:00,
                      13:00, 14:00, 15:00, 16:00, 17:00, 19:00
                    </td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>22</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS (JADWAL TAMBAHAN)</td>
                    <td>PURWOREJO</td>
                    <td>Rp100.000,00</td>
                    <td>03:00, 07:00, 09:00, 13:00, 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>PURWOREJO</td>
                    <td>Rp110.000,00</td>
                    <td>07:00, 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>24</td>
                    <td>RIYAN</td>
                    <td>NON EKONOMI</td>
                    <td>WATES</td>
                    <td>Rp100.000,00</td>
                    <td>
                      01:30, 07:45, 08:45, 09:45, 12:45, 13:45, 15:50, 22:00
                    </td>
                    <td>085746039370</td>
                  </tr>
                  <tr>
                    <td>25</td>
                    <td>RIYAN</td>
                    <td>EKONOMI</td>
                    <td>WATES</td>
                    <td>Rp120.000,00</td>
                    <td>00:50, 01:50, 02:50, 08:50, 09:25, 10:05</td>
                    <td>085746039370</td>
                  </tr>
                  <tr>
                    <td>26</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>KARANGANYAR</td>
                    <td>Rp60.000,00</td>
                    <td>06:00, 08:00, 09:00, 10:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>27</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>GUYANGAN</td>
                    <td>Rp60.000,00</td>
                    <td>06:00, 08:00, 09:00, 10:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>28</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>PETANAHAN</td>
                    <td>Rp60.000,00</td>
                    <td>06:00, 08:00, 09:00, 10:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>29</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>GUNUNG KIDUL</td>
                    <td>Rp140.000,00</td>
                    <td>17:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>30</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>MAGELANG</td>
                    <td>Rp100.000,00</td>
                    <td>03:00, 07:00, 09:00, 13:00, 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>31</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>BAWEN</td>
                    <td>Rp130.000,00</td>
                    <td>03:00, 07:00, 09:00, 13:00, 15:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>32</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>KUDUS</td>
                    <td>Rp200.000,00</td>
                    <td>01:00 / 05:00 / 11:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>33</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>DEMAK</td>
                    <td>Rp200.000,00</td>
                    <td>01:00 / 05:00 / 11:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>34</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>JEPARA</td>
                    <td>Rp200.000,00</td>
                    <td>01:00 / 05:00 / 11:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>35</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>BATANG</td>
                    <td>Rp90.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>36</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>PEMALANG</td>
                    <td>Rp130.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>37</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>PEKALONGAN</td>
                    <td>Rp130.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>38</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>KENDAL</td>
                    <td>Rp130.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>39</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>SLAWI</td>
                    <td>Rp90.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>40</td>
                    <td>SARI GEDE</td>
                    <td>EKONOMI</td>
                    <td>SLAWI</td>
                    <td>Rp70.000,00</td>
                    <td>03:00 / 06:00 / 13:30</td>
                    <td>085877603572</td>
                  </tr>
                  <tr>
                    <td>41</td>
                    <td>EFISIENSI</td>
                    <td>GOLD</td>
                    <td>KUDUS / DEMAK / JEPARA</td>
                    <td>Rp200.000,00</td>
                    <td>01:00 / 05:00 / 11:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>42</td>
                    <td>ARIES</td>
                    <td>EKONOMI</td>
                    <td>BUMIAYU</td>
                    <td>Rp40.000,00</td>
                    <td>13:00</td>
                    <td>085220833770</td>
                  </tr>
                  <tr>
                    <td>43</td>
                    <td>ARIES</td>
                    <td>EKONOMI</td>
                    <td>BUMIAYU</td>
                    <td>Rp40.000,00</td>
                    <td>03:30 / 04:30 / 05:30 / 06:30</td>
                    <td>081234250420</td>
                  </tr>
                  <tr>
                    <td>44</td>
                    <td>SARI GEDE</td>
                    <td>EKONOMI</td>
                    <td>BUMIAYU</td>
                    <td>Rp40.000,00</td>
                    <td>03:00 / 06:00 / 13:30</td>
                    <td>085877603572</td>
                  </tr>
                  <tr>
                    <td>45</td>
                    <td>ARIES</td>
                    <td>EKONOMI</td>
                    <td>BREBES</td>
                    <td>Rp70.000,00</td>
                    <td>13:00</td>
                    <td>085220833770</td>
                  </tr>
                  <tr>
                    <td>46</td>
                    <td>ARIES</td>
                    <td>EKONOMI</td>
                    <td>BREBES</td>
                    <td>Rp70.000,00</td>
                    <td>03:30 / 04:30 / 05:30 / 06:30</td>
                    <td>081234250420</td>
                  </tr>
                  <tr>
                    <td>47</td>
                    <td>SARI GEDE</td>
                    <td>EKONOMI</td>
                    <td>TEGAL</td>
                    <td>Rp70.000,00</td>
                    <td>03:00 / 06:00 / 13:30</td>
                    <td>085877603572</td>
                  </tr>
                  <tr>
                    <td>48</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>BATANG</td>
                    <td>Rp90.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>49</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>PEMALANG / PEKALONGAN / KENDAL</td>
                    <td>Rp130.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>50</td>
                    <td>EFISIENSI</td>
                    <td>BISNIS</td>
                    <td>SLAWI</td>
                    <td>Rp90.000,00</td>
                    <td>06:00</td>
                    <td>087883027400</td>
                  </tr>
                  <tr>
                    <td>51</td>
                    <td>PUTRA KEMBAR</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>06:37 / 08:00 / 11:17 / 12:20</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>52</td>
                    <td>ARIES</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>07:10 / 10:55 / 15:23</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>53</td>
                    <td>ARIES</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>07:15 / 12:00 / 16:30</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>54</td>
                    <td>CITRA MAS</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>07:05 / 11:25</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>55</td>
                    <td>JAYA MANDIRI</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>06:55 / 11:15 / 15:30</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>56</td>
                    <td>KELUARGA</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>06:40 / 07:40 / 11:20 / 16:20</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>57</td>
                    <td>EFISIENSI</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>07:45 / 12:10 / 16:44</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>58</td>
                    <td>TUNGGAL PUTRA</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>06:30 / 12:10</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>59</td>
                    <td>TANPA NAMA</td>
                    <td>-</td>
                    <td>PURWOKERTO</td>
                    <td>Rp10.000 - Rp50.000</td>
                    <td>06:50 / 07:10 / 10:48 / 11:10 / 15:08</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>60</td>
                    <td>PUTRA TUNGGAL</td>
                    <td>-</td>
                    <td>SIDAREJA</td>
                    <td>Rp10.000 - Rp35.000</td>
                    <td>07:30 / 12:30</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>61</td>
                    <td>KOPA JAYA</td>
                    <td>-</td>
                    <td>SIDAREJA</td>
                    <td>Rp10.000 - Rp35.000</td>
                    <td>
                      06:45 / 07:00 / 07:15 / 11:00 / 11:06 / 11:35 / 14:30 /
                      15:36
                    </td>
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
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"
      ><i class="fa fa-arrow-up"></i
    ></a>

  </body>
@endsection