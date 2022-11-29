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
Route::get('/siswa',[AdminController::class, 'siswa'])->name('siswa');
Route::get('/siswa/edit/{id}',[AdminController::class, 'siswa_edit'])->name('siswa_edit');
Route::post('/siswa/update',[AdminController::class, 'verif_siswa'])->name('verif_siswa');
Route::get('/siswa/delete/{id}',[AdminController::class, 'siswa_delete'])->name('siswa_delete');
Route::get('/ortu',[AdminController::class, 'ortu'])->name('ortu');
Route::get('/ortu/edit/{id}',[AdminController::class, 'ortu_edit'])->name('ortu_edit');
Route::post('/ortu/update',[AdminController::class, 'verif_ortu'])->name('verif_ortu');
Route::get('/ortu/delete/{id}',[AdminController::class, 'ortu_delete'])->name('ortu_delete');
Route::get('/kelas',[AdminController::class, 'kelas'])->name('kelas');
Route::get('/kelas/edit/{id}',[AdminController::class, 'kelas_edit'])->name('kelas_edit');
Route::post('/kelas/update',[AdminController::class, 'verif_kelas'])->name('verif_kelas');
Route::get('/kelas/delete/{id}',[AdminController::class, 'kelas_delete'])->name('kelas_delete');
Route::get('/kelas/tambahkelas',[AdminController::class, 'tambahkelas'])->name('tambahkelas');



Route::post('/riwayat_pembayaran',[ClientController::class, 'riwayat_pembayaran'])->name('riwayat_pembayaran');
Route::post('/riwayat_ujian',[ClientController::class, 'riwayat_ujian'])->name('riwayat_ujian');
Route::get('/pembayaran/{id}',[ClientController::class, 'pembayaran'])->name('pembayaran');
Route::get('/upload_pembayaran/{id}',[ClientController::class, 'upload_pembayaran'])->name('upload_pembayaran');
Route::post('/bukti',[ClientController::class, 'bukti'])->name('bukti');

Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function(){

});



