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

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px">
            <h3
                class="text-white display-3 mb-4 wow fadeInDown"
                data-wow-delay="0.1s">
                Tarif Tiket ke JABODETABEK
            </h3>
            <nav aria-label="breadcrumb">
                <ol
                    class="breadcrumb justify-content-center mb-0 wow fadeInDown"
                    data-wow-delay="0.3s">
                    <li class="breadcrumb-item">
                        <a href="{{url('/index')}}" class="text-white">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('/tarif_tiket')}}" class="text-white">Tarif Tiket</a>
                    </li>
                    <li class="breadcrumb-item active text-warning">JABODETABEK</li>
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
                data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Tarif Bus ke JABODETABEK</h5>
                </div>
                <h1 class="display-5 mb-4">Daftar Tarif Tiket ke JABODETABEK</h1>
                <p class="mb-0">
                    Terminal BMD Cilacap menyediakan layanan bus ke berbagai wilayah di
                    JABODETABEK dengan jadwal yang fleksibel
                </p>
            </div>

            <!-- Navigation Links -->
            <div class="text-center mb-4 wow fadeInUp" data-wow-delay="0.2s">
                <a
                    href="{{url('/tarif_tiket')}}"
                    class="btn btn-outline-primary border-warning rounded-pill px-4 py-2 me-3">
                    <i class="fas fa-list me-2"></i>Semua Provinsi
                </a>
            </div>

            <!-- Tabel Tarif Jakarta -->
            <div class="card border-0 shadow-lg wow fadeInUp" data-wow-delay="0.3s">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-building me-2"></i>Tarif Tiket Bus ke JABODETABEK
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
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BALARAJA</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BALARAJA</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>DAMRI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BITUNG</td>
                                    <td>Rp155.000,00</td>
                                    <td>15:00</td>
                                    <td>0895322320525 & 089665561205</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BITUNG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BITUNG</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIKUPA</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIKUPA</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>SERANG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>SERANG</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BEKASI</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>DMI</td>
                                    <td>BISNIS AC</td>
                                    <td>BEKASI</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BEKASI</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BEKASI</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BEKASI</td>
                                    <td>Rp130.000,00</td>
                                    <td>18:00 / 18:20</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CAKUNG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CILEGON</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CILEGON</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>MERAK</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>MERAK</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>TJ. PRIOK</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>TJ. PRIOK</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>TJ. PRIOK</td>
                                    <td>Rp130.000,00</td>
                                    <td>18:15</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>23</td>
                                    <td>DAMRI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KP. RAMBUTAN</td>
                                    <td>Rp155.000,00</td>
                                    <td>15:00 / 19:00</td>
                                    <td>0895322320525 & 089665561205</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KP. RAMBUTAN</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>25</td>
                                    <td>DMI</td>
                                    <td>BISNIS AC</td>
                                    <td>KP. RAMBUTAN</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>26</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KP. RAMBUTAN</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>27</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KP. RAMBUTAN</td>
                                    <td>Rp130.000,00</td>
                                    <td>07:10 / 18:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>28</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF LEGRES</td>
                                    <td>KP. RAMBUTAN</td>
                                    <td>Rp160.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>29</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PS. REBO</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>30</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF LEGRES</td>
                                    <td>PS. REBO</td>
                                    <td>Rp160.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>31</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>DEPOK</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>32</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BOGOR</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>33</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BOGOR</td>
                                    <td>Rp130.000,00</td>
                                    <td>07:00 / 17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>34</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>MERAK</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>35</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>MERAK</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>36</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BUBULAK</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>37</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BANTAR GEBANG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>38</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>NAROGONG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>39</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CILEUNGSI</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>40</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>GUNUNG PUTRI</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>41</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>GROGOL</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>42</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>GROGOL</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>43</td>
                                    <td>DAMRI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KALIDERES</td>
                                    <td>Rp155.000,00</td>
                                    <td>15:00</td>
                                    <td>0895322320525 & 089665561205</td>
                                </tr>
                                <tr>
                                    <td>44</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KALIDERES</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>45</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KALIDERES</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>46</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KALIDERES</td>
                                    <td>Rp130.000,00</td>
                                    <td>07:10 / 17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>47</td>
                                    <td>DAMRI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PORIS</td>
                                    <td>Rp155.000,00</td>
                                    <td>15:00</td>
                                    <td>0895322320525 & 089665561205</td>
                                </tr>
                                <tr>
                                    <td>48</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PORIS</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>49</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PORIS</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>50</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PORIS</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>51</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>RAJEG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>52</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KUTABUMI</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>53</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KUTABUMI</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>54</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIKARANG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>55</td>
                                    <td>DMI</td>
                                    <td>BISNIS</td>
                                    <td>CIKARANG</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>56</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIKARANG</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>57</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIKARANG</td>
                                    <td>Rp130.000,00</td>
                                    <td>18:20</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>58</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIBITUNG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>59</td>
                                    <td>DMI</td>
                                    <td>BISNIS</td>
                                    <td>CIBITUNG</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>60</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIBITUNG</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>61</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIBITUNG</td>
                                    <td>Rp130.000,00</td>
                                    <td>07:00 / 17:30 / 18:00 / 18:15 / 18:20</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>62</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>LEBAK BULUS</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>63</td>
                                    <td>DMI</td>
                                    <td>BISNIS</td>
                                    <td>LEBAK BULUS</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>64</td>
                                    <td>DMI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>LEBAK BULUS</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:15</td>
                                    <td>08997934600</td>
                                </tr>
                                <tr>
                                    <td>65</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>LEBAK BULUS</td>
                                    <td>Rp130.000,00</td>
                                    <td>07:10 / 17:30 / 18:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>66</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PONDOK PINANG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>67</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PARUNG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>68</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIPUTAT</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>69</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF LEGRES</td>
                                    <td>CIPUTAT</td>
                                    <td>Rp160.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>70</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>BSD</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>71</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>JATAKE</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>72</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>JATILUWUNG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>73</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PS. KEMIS</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>74</td>
                                    <td>MURNI JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIBINONG</td>
                                    <td>Rp150.000,00</td>
                                    <td>17:00</td>
                                    <td>081236403379</td>
                                </tr>
                                <tr>
                                    <td>75</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIBINONG</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>76</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PULO GEBANG</td>
                                    <td>Rp110.000,00</td>
                                    <td>07:15</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>77</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>PULO GEBANG</td>
                                    <td>Rp130.000,00</td>
                                    <td>18:15</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>78</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CIAMIS</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>79</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CILEUNYI</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>80</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>JATIJAJAR</td>
                                    <td>Rp130.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>81</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF</td>
                                    <td>CILEDUG</td>
                                    <td>Rp130.000,00</td>
                                    <td>18:00</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>82</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF LEGRES</td>
                                    <td>PS. MINGGU</td>
                                    <td>Rp160.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>83</td>
                                    <td>SINAR JAYA</td>
                                    <td>EKSEKUTIF LEGRES</td>
                                    <td>PONDOK CABE</td>
                                    <td>Rp160.000,00</td>
                                    <td>17:30</td>
                                    <td>082216726222</td>
                                </tr>
                                <tr>
                                    <td>84</td>
                                    <td>DAMRI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>KEMAYORAN</td>
                                    <td>Rp155.000,00</td>
                                    <td>15:00 / 19:00</td>
                                    <td>0895322320525</td>
                                </tr>
                                <tr>
                                    <td>85</td>
                                    <td>DAMRI</td>
                                    <td>EKSEKUTIF</td>
                                    <td>TANGERANG</td>
                                    <td>Rp155.000,00</td>
                                    <td>15:00</td>
                                    <td>0895322320525</td>
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
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


</body>
@endsection