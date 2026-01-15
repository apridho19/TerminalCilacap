<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('landing_page.index');
});

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


