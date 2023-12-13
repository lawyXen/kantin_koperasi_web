<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\pulsaController;
use App\Http\Controllers\PemesananMakananMinumanController;
use App\Http\Controllers\ruanganController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\BookingRuanganController;
use App\Http\Controllers\BeliPulsaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {

Route::get('/', function () {
    return view('admin-side.page-admin.home-admin');
});

//Makanan Minuman
Route::get('/kelolaproduk', [produkController::class, 'index']);
Route::get('/tambah-produk', [produkController::class, 'create']);
Route::get('/edit-produk/{id}', [produkController::class, 'edit']);
Route::post('/edit-produk-kantin/{id}', [produkController::class, 'update'])->name('produk.ubah');
Route::post('/tambah-produk-kantin/store', [produkController::class, 'store'])->name('formproduk.store');
Route::get('/produk/delete/{id}', [produkController::class, 'delete'])->name('produk.hapus');

//kelola barang
Route::get('/kelolabarang', [barangController::class, 'index']);
Route::get('/tambah-barang', [barangController::class, 'create']);
Route::get('/edit-barang/{id}', [barangController::class, 'edit']);
Route::post('/edit-barang-koperasi/{id}', [barangController::class, 'update'])->name('barang.ubah');
Route::post('/tambah-barang-koperasi/store', [barangController::class, 'store'])->name('formbarang.store');
Route::get('/barang/delete/{id}', [barangController::class, 'delete'])->name('barang.hapus');

//valdiasi pesanan makanan
Route::get('/validasipesanan', [PemesananMakananMinumanController::class, 'index']);
Route::get('/edit-transaksi/{id}', [PemesananMakananMinumanController::class, 'edit']);
Route::post('/edit-transaksi/{id}', [PemesananMakananMinumanController::class, 'update'])->name('transaksi.ubah');
Route::get('/validasipesanan/delete/{id}', [PemesananMakananMinumanController::class, 'delete']);
Route::get('/kelolapulsa', [pulsaController::class, 'index']);
Route::get('/validasipulsa', [pulsaController::class, 'validasiindex']);

//kelola akun
Route::get('/kelolaakun', [akunController::class, 'index']);
Route::get('/kelolaakun/delete/{id}', [akunController::class, 'delete']);
});


//kelola ruangan
Route::get('/kelolaruangan', [ruanganController::class, 'kelolaruangan']);
Route::get('/tambahruangan', [ruanganController::class, 'tambahruangan']);
Route::post('/tambahruangan/store', [ruanganController::class, 'store'])->name('ruangan.store');
Route::post('/editruangan/{id}', [ruanganController::class, 'update'])->name('ruangan.ubah');
Route::get('/editruangan/{id}', [ruanganController::class, 'edit']);
Route::get('/ruangan/delete/{id}', [ruanganController::class, 'delete'])->name('ruangan.hapus');

//booking ruangan

Route::get('/validasiruangan', [BookingRuanganController::class, 'index']);
Route::get('/edit-ruangan/{id}', [BookingRuanganController::class, 'edit']);
Route::post('/edit-ruangan/{id}', [BookingRuanganController::class, 'update'])->name('ruangan.ubah');
Route::get('/validasiruangan/delete/{id}', [BookingRuanganController::class, 'delete']);

//beli pulsa
Route::get('/validasipulsa', [BeliPulsaController::class, 'index']);
Route::get('/edit-pulsa/{id}', [BeliPulsaController::class, 'edit']);
Route::post('/edit-pulsa/{id}', [BeliPulsaController::class, 'update'])->name('pulsa.ubah');
Route::get('/validasipulsa/delete/{id}', [BeliPulsaController::class, 'delete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
