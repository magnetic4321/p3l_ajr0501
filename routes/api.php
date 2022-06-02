<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\MobilApiController;
use App\Http\Controllers\PromoApiController;
use App\Http\Controllers\TransaksiApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mobils', [MobilApiController::class, 'index']);
Route::get('/promos', [PromoApiController::class, 'index']);
Route::get('/transaksis', [TransaksiApiController::class, 'index']);
// Route::get('/transaksis/laporan', [TransaksiApiController::class, 'laporanTransaksi']);
Route::get('/transaksis/laporan/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanTransaksi']);
Route::get('/transaksis/laporan-customer/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanCustomer']);
Route::get('/transaksis/laporan-driver/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanDriver']);
Route::get('/transaksis/laporan-performa/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanPerforma']);
Route::get('/transaksis/laporan-mobil/{tahun}/{bulan}', [TransaksiApiController::class, 'laporanMobil']);

Route::post('/login', [LoginApiController::class, 'login']);
Route::post('/logout', [LoginApiController::class, 'logout']);

