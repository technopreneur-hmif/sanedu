<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/test', function () {
    return view('layouts.cms.app');
});

Route::post('/login', [AuthController::class, 'index'])->name('login');
Route::get('/loginadmin', [AuthController::class, 'loginadmin'])->name('loginadmin');
Route::post('/daftar_ortu', [AuthController::class, 'daftar_ortu'])->name('daftar_ortu');
Route::post('/check_login', [AuthController::class, 'check_login'])->name('check_login');
Route::post('/clientside', [AuthController::class, 'clientside'])->name('clientside');
Route::post('/check_loginadmin', [AuthController::class, 'check_loginadmin'])->name('check_loginadmin');


Route::get('/loginortu', [AuthenController::class, 'loginortu'])->name('loginortu');
Route::get('/loginsiswa', [AuthenController::class, 'loginsiswa'])->name('loginsiswa');
Route::get('/pendaftaransiswa', [AuthenController::class, 'pendaftaransiswa'])->name('pendaftaransiswa');
Route::get('/pendaftaranortu', [AuthenController::class, 'pendaftaranortu'])->name('pendaftaranortu');
Route::post('/daftarsiswa', [AuthController::class, 'daftarsiswa'])->name('daftarsiswa');
Route::post('/daftarortu', [AuthController::class, 'daftarortu'])->name('daftarortu');

Route::get('/verifikasi',[AdminController::class, 'verifikasi'])->name('verifikasi');
Route::get('/verifikasi/verifikasi_edit/{id}',[AdminController::class, 'verifikasi_edit'])->name('verifikasi_edit');
Route::post('/verifikasi/update',[AdminController::class, 'verifikasi_update'])->name('verifikasi_update');
Route::get('/verifikasi/delete/{id}',[AdminController::class, 'destroy'])->name('verifikasi_delete');

Route::post('/riwayat_pembayaran',[ClientController::class, 'riwayat_pembayaran'])->name('riwayat_pembayaran');
Route::post('/riwayat_ujian',[ClientController::class, 'riwayat_ujian'])->name('riwayat_ujian');
Route::get('/pembayaran',[ClientController::class, 'pembayaran'])->name('pembayaran');

Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function(){

});



