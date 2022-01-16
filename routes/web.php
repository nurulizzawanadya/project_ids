<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\CustomerImportController;
use App\Http\Controllers\CURLController;

//login
Route::view('/home', 'home')->name('home');
Route::view('/login', 'login')->name('login');
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/logout',function(){
    Auth::logout();
    return  redirect ('/login');
})->name('logout');

//data customer
Route::view('/data-customer', 'data_customer')->name('data-customer');
Route::get('/data-customer', [CustomerController::class, 'index']);
//insert customer 1
Route::get('/insertCustomer', [CustomerController::class, 'list']);
Route::post('/insertCustomer', [CustomerController::class, 'insertCustomer'])->name('insertCustomer');
Route::get('/findKota', [CustomerController::class, 'findKota'])->name('findKota');
Route::get('/findKecamatan', [CustomerController::class, 'findKecamatan'])->name('findKecamatan');
Route::get('/findKelurahan', [CustomerController::class, 'findKelurahan'])->name('findKelurahan');
Route::get('/findKodepos', [CustomerController::class, 'findKodepos'])->name('findKodepos');
//insert customer 2
Route::get('/insertCustomer2', [CustomerController::class, 'list2']);
Route::post('/insertCustomer2', [CustomerController::class, 'insertCustomer2'])->name('insertCustomer2');
Route::get('/findKota2', [CustomerController::class, 'findKota2'])->name('findKota2');
Route::get('/findKecamatan2', [CustomerController::class, 'findKecamatan2'])->name('findKecamatan2');
Route::get('/findKelurahan2', [CustomerController::class, 'findKelurahan2'])->name('findKelurahan2');
Route::get('/findKodepos2', [CustomerController::class, 'findKodepos2'])->name('findKodepos2');

//import customer
Route::get('/import-data', [CustomerImportController::class, 'index']);
Route::post('/import', [CustomerImportController::class, 'store'])->name('customer.import');

//barang
Route::get('/data-barang', [BarangController::class, 'index']);
Route::get('/scanBarcode', [BarangController::class, 'scanBarcode']);
Route::get('/cetakBarcode', [BarangController::class, 'cetakBarcode']);
Route::get('/findBarang', [BarangController::class, 'findBarang']);
Route::post('/cetak_barcode', [BarangController::class, 'cetak_barcode']);
Route::get('/cetak_barcode', [BarangController::class, 'cetak_barcode']);
Route::post('/cetak_barcode2', [BarangController::class, 'cetak_barcode2']);
Route::get('/cetak_barcode2', [BarangController::class, 'cetak_barcode2']);

// lokasi-toko
//toko - titik awal
Route::get('/data-toko', [TokoController::class, 'index']);
Route::get('/insertToko', [TokoController::class, 'tambahToko']);
Route::post('/insertToko', [TokoController::class, 'insertToko'])->name('insertToko');

//toko - titik kunjungan
Route::get('/titik-kunjungan', [TokoController::class, 'titikKunjungan']);
Route::get('/findToko', [TokoController::class, 'findToko']);
Route::get('/cetak_toko/{id}', [TokoController::class, 'cetakBarcode_toko'])->name('cetakBarcode_toko');

//scoreboard
Route::get('/scoreboard', [ScoreboardController::class, 'scoreboard']);
Route::get('/scoreboard-controller', [ScoreboardController::class, 'index']);
Route::post('/scoreboard-controller/update', [ScoreboardController::class, 'store']);
Route::get('/messages', [ScoreboardController::class, 'message']);

//curl
Route::resource('/curlBooks', CURLController::class);