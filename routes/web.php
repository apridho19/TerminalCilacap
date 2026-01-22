<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMasterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('landing_page.index');
});

// Route::get('/index', function () {
//     return view('landing_page.index');
// });

Route::get('/kilas_balik', function () {
    return view('landing_page.kilas_balik');
});

Route::get('/visi_misi', function () {
    return view('landing_page.visi_misi');
});

Route::get('/struktur_organisasi', function () {
    return view('landing_page.struktur_organisasi');
});

Route::get('/fasilitas', function () {
    return view('landing_page.layout_fasilitas');
});

Route::get('/maklumat', function () {
    return view('landing_page.maklumat');
});

Route::get('/hasil_skm', function () {
    return view('landing_page.hasil_skm');
});

Route::get('/layanan_pengaduan', function () {
    return view('landing_page.layanan_pengaduan');
});

Route::get('/kontak', function () {
    return view('landing_page.kontak');
});

Route::get('/daftar_po', function () {
    return view('landing_page.daftar_po');
});

Route::get('/tarif_tiket', function () {
    return view('landing_page.tarif_tiket');
});

Route::get('/tarif_jabodetabek', function () {
    return view('landing_page.detail_tarif.tarif_jabodetabek');
});

Route::get('/tarif_jateng', function () {
    return view('landing_page.detail_tarif.tarif_jateng');
});

Route::get('/tarif_jatim', function () {
    return view('landing_page.detail_tarif.tarif_jatim');
});

Route::get('/tarif_jabar', function () {
    return view('landing_page.detail_tarif.tarif_jabar');
});




#####################################
# SISTEM INFORMASI TERMINAL CILACAP #
#####################################

Route::get('/dashboard', function () {
    return view('sistem_informasi.dashboard');
});

Route::get('/datamaster', [DataMasterController::class, 'index'])->name('datamaster.index');