<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\KeberangkatanController;
use App\Http\Controllers\KedatanganController;
use App\Http\Controllers\DataProduksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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

Route::middleware(['auth'])->group(function () {
    // Dashboard - untuk semua yang login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/datamaster', [DataMasterController::class, 'index'])->name('datamaster.index');
        Route::post('/datamaster/import', [DataMasterController::class, 'import'])->name('datamaster.import');
        Route::post('/datamaster/remove-duplicates', [DataMasterController::class, 'removeDuplicates'])->name('datamaster.remove.duplicates');

        Route::get('/dataproduksi', [DataProduksiController::class, 'index'])->name('dataproduksi.index');
        Route::get('/dataproduksi/laporan-harian', [DataProduksiController::class, 'laporanHarian'])->name('dataproduksi.laporan.harian');
        Route::get('/dataproduksi/rekap-bulanan', [DataProduksiController::class, 'rekapBulanan'])->name('dataproduksi.rekap.bulanan');
        Route::get('/dataproduksi/grafik', [DataProduksiController::class, 'grafik'])->name('dataproduksi.grafik');
        Route::post('/dataproduksi/export', [DataProduksiController::class, 'export'])->name('dataproduksi.export');
        Route::post('/dataproduksi/export-pdf', [DataProduksiController::class, 'exportPdf'])->name('dataproduksi.export.pdf');
        Route::post('/dataproduksi/export-laporan-pdf', [DataProduksiController::class, 'exportLaporanPdf'])->name('dataproduksi.export.laporan.pdf');
    });

    // Route untuk Admin dan Pegawai (Keberangkatan & Kedatangan)
    Route::get('/keberangkatan', [KeberangkatanController::class, 'index'])->name('keberangkatan.index');
    Route::get('/keberangkatan/create', [KeberangkatanController::class, 'create'])->name('keberangkatan.create');
    Route::post('/keberangkatan', [KeberangkatanController::class, 'store'])->name('keberangkatan.store');

    Route::get('/kedatangan', [KedatanganController::class, 'index'])->name('kedatangan.index');
    Route::get('/kedatangan/create', [KedatanganController::class, 'create'])->name('kedatangan.create');
    Route::post('/kedatangan', [KedatanganController::class, 'store'])->name('kedatangan.store');
});
