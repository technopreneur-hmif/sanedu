<?php

use App\Http\Controllers\Admin\AdminAbsentController;
use App\Http\Controllers\Admin\AdminFinanceController;
use App\Http\Controllers\Admin\AdminUserController;
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
Route::post('/kelas/penambahan_kelas',[AdminController::class, 'penambahan_kelas'])->name('penambahan_kelas');
Route::get('/logout',[AdminController::class, 'logout'])->name('logoutadmin');



Route::get('/absensi',[ClientController::class, 'absensi'])->name('absensi');
Route::get('/riwayat_pembayaran',[ClientController::class, 'riwayat_pembayaran'])->name('riwayat_pembayaran');
Route::get('/riwayat_ujian',[ClientController::class, 'riwayat_ujian'])->name('riwayat_ujian');
Route::get('/pembayaran/{id}',[ClientController::class, 'pembayaran'])->name('pembayaran');
Route::get('/upload_pembayaran/{id}',[ClientController::class, 'upload_pembayaran'])->name('upload_pembayaran');
Route::post('/bukti',[ClientController::class, 'bukti'])->name('bukti');
Route::get('/scan/{id}',[ClientController::class, 'scan'])->name('scan');
Route::post('/validasi_qrcode',[ClientController::class, 'validasi_qrcode'])->name('validasi_qrcode');

Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function(){

});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    
    Route::get('/',[AdminController::class, 'index'])->name('admin');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/',[AdminUserController::class, 'index'])->name('admin.user');
        Route::get('/verifikasi',[AdminUserController::class, 'index'])->name('admin.user.verification');
        Route::get('/verifikasi/edit/{id}',[AdminUserController::class, 'verifikasiEdit'])->name('admin.user.verification.edit');
        Route::post('/verifikasi/update',[AdminUserController::class, 'verifikasiUpdate'])->name('admin.user.verification.update');
        Route::get('/student',[AdminUserController::class, 'student'])->name('admin.user.student');
        Route::get('/parent',[AdminUserController::class, 'parent'])->name('admin.user.parent');
        Route::get('/class-list',[AdminUserController::class, 'classList'])->name('admin.user.class');
    });

    Route::group(['prefix' => 'finance'], function () {
        Route::get('/',[AdminFinanceController::class, 'history'])->name('admin.finance');
        Route::get('/payment',[AdminFinanceController::class, 'payment'])->name('admin.finance.payment');
        Route::get('/payment/delete/{id}',[AdminFinanceController::class, 'paymentDelete'])->name('admin.finance.payment.delete');
        Route::get('/payment/acc/{id}',[AdminFinanceController::class, 'paymentAcc'])->name('admin.finance.payment.acc');
        Route::get('/history',[AdminFinanceController::class, 'history'])->name('admin.finance.history');
    });

    Route::group(['prefix' => 'absent'], function () {
        Route::get('/',[AdminAbsentController::class, 'absent'])->name('admin.absent');
        Route::get('/meeting',[AdminAbsentController::class, 'meeting'])->name('admin.absent.meeting');
        Route::get('/meeting/form/{id?}',[AdminAbsentController::class, 'meetingForm'])->name('admin.absent.meeting.form');
        Route::post('/meeting/form/{id?}',[AdminAbsentController::class, 'meetingSave'])->name('admin.absent.meeting.save');
        Route::get('/meeting/delete/{id}',[AdminAbsentController::class, 'meetingDelete'])->name('admin.absent.meeting.delete');
        Route::get('/history',[AdminAbsentController::class, 'absentHistory'])->name('admin.absent.history');
    });

});


