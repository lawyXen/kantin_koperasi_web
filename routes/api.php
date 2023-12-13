<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\BookingRuanganController;
use App\Http\Controllers\Api\BeliPulsaController;
use App\Http\Controllers\Api\TransaksiBaarangController;

/*  
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);
Route::get('makananminuman', [ProdukController::class,'index']);
Route::get('barang', [BarangController::class,'index']);
Route::post('transaksi', [TransaksiController::class,'store']);
Route::get('transaksi/user/{id}',[TransaksiController::class,'history']);
Route::get('transaksi/batal/{id}',[TransaksiController::class,'batal']);
Route::post('bookingruangan',[BookingRuanganController::class,'boobkingRuangan']);
Route::post('belipulsa',[BeliPulsaController::class,'belipulsa']);
Route::post('transaksibarang', [TransaksiBaarangController::class,'storeTambah']);
Route::get('transaksibarang/user/{id}',[TransaksiBaarangController::class,'historyTambah']);
Route::get('transaksibarang/batal/{id}',[TransaksiBaarangController::class,'batal']);
