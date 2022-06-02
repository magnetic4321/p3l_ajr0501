<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardMitraController;
use App\Http\Controllers\DashboardMobilController;
use App\Http\Controllers\DashboardPromoController;
use App\Http\Controllers\DashboardDriverController;
use App\Http\Controllers\DashboardJadwalController;
use App\Http\Controllers\DashboardPegawaiController;
use App\Http\Controllers\DashboardCustomerController;
use App\Http\Controllers\DashboardTransaksiController;

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

Route::get('/', function () {
    return view('home', [
        "title" => 'Home',
    ]);
});

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('customers/{customer:slug}', [CustomerController::class, 'show']);

Route::get('/mobils', [MobilController::class, 'index']);
Route::get('mobils/{mobil:no_plat}', [MobilController::class, 'show']);

Route::get('/mitras', [MitraController::class, 'index']);
Route::get('mitras/{mitra:slug}', [MitraController::class, 'show']);

Route::get('/roles', [RoleController::class, 'index']);
Route::get('roles/{role:id}', [RoleController::class, 'show']);

Route::get('/pegawais', [PegawaiController::class, 'index']);
Route::get('pegawais/{pegawai:slug}', [PegawaiController::class, 'show']);

Route::get('/drivers', [DriverController::class, 'index']);
Route::get('drivers/{driver:slug}', [DriverController::class, 'show']);

Route::get('/jadwals', [JadwalController::class, 'index']);
Route::get('jadwals/{jadwal:id}', [JadwalController::class, 'show']);

Route::get('/promos', [PromoController::class, 'index']);
Route::get('promos/{promo:kode}', [PromoController::class, 'show']);

// 

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// 

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

// 

Route::resource('dashboard/users', DashboardUserController::class)->middleware('auth');

Route::get('dashboard/pegawais/checkSlug', [DashboardPegawaiController::class, 'checkSlug']);
Route::resource('dashboard/pegawais', DashboardPegawaiController::class)->middleware('auth');

Route::resource('dashboard/promos', DashboardPromoController::class)->middleware('auth');

Route::resource('dashboard/jadwals', DashboardJadwalController::class)->middleware('auth');

Route::get('dashboard/mitras/checkSlug', [DashboardMitraController::class, 'checkSlug']);
Route::resource('dashboard/mitras', DashboardMitraController::class)->middleware('auth');

Route::resource('dashboard/mobils', DashboardMobilController::class);

Route::get('dashboard/drivers/checkSlug', [DashboardDriverController::class, 'checkSlug']);
Route::resource('dashboard/drivers', DashboardDriverController::class)->middleware('auth');

Route::get('dashboard/customers/checkSlug', [DashboardDriverController::class, 'checkSlug']);
Route::resource('dashboard/customers', DashboardCustomerController::class)->middleware('auth');

Route::get('dashboard/transaksis/rating', [DashboardTransaksiController::class, 'indexRating'])->middleware('auth');
// Route::get('dashboard/transaksis/laporan', [DashboardTransaksiController::class, 'laporanTransaksi'])->middleware('auth');
// Route::get('dashboard/transaksis/laporan-customer', [DashboardTransaksiController::class, 'laporanCustomer'])->middleware('auth');
// Route::get('dashboard/transaksis/laporan-driver', [DashboardTransaksiController::class, 'laporanDriver'])->middleware('auth');
// Route::get('dashboard/transaksis/laporan-mobil', [DashboardTransaksiController::class, 'laporanMobil'])->middleware('auth');
// Route::get('dashboard/transaksis/laporan-performa', [DashboardTransaksiController::class, 'laporanPerforma'])->middleware('auth');

Route::resource('dashboard/transaksis', DashboardTransaksiController::class)->middleware('auth');
Route::post('dashboard/transaksis/{transaksi:id}/updateBukti', [DashboardTransaksiController::class, 'updateBukti'])->middleware('auth');
Route::post('dashboard/transaksis/{transaksi:id}/updateStatus', [DashboardTransaksiController::class, 'updateStatus'])->middleware('auth');
Route::post('dashboard/transaksis/{transaksi:id}/updatePengembalian', [DashboardTransaksiController::class, 'updatePengembalian'])->middleware('auth');
Route::post('dashboard/transaksis/{transaksi:id}/updateRating', [DashboardTransaksiController::class, 'updateRating'])->middleware('auth');





