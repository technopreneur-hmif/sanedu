<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenController;
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

Route::post('/login', [AuthController::class, 'index'])->name('login');
Route::get('/loginadmin', [AuthController::class, 'loginadmin'])->name('loginadmin');
Route::post('/daftar_ortu', [AuthController::class, 'daftar_ortu'])->name('daftar_ortu');
Route::post('/check_login', [AuthController::class, 'check_login'])->name('check_login');
Route::post('/check_loginadmin', [AuthController::class, 'check_loginadmin'])->name('check_loginadmin');


Route::get('/loginortu', [AuthenController::class, 'loginortu'])->name('loginortu');
Route::get('/loginsiswa', [AuthenController::class, 'loginsiswa'])->name('loginsiswa');
Route::get('/pendaftaransiswa', [AuthenController::class, 'pendaftaransiswa'])->name('pendaftaransiswa');
Route::get('/pendaftaranortu', [AuthenController::class, 'pendaftaranortu'])->name('pendaftaranortu');
Route::post('/daftarsiswa', [AuthController::class, 'daftarsiswa'])->name('daftarsiswa');
Route::post('/daftarortu', [AuthController::class, 'daftarortu'])->name('daftarortu');

Route::get('/verifikasi',[AuthController::class, 'verifikasi'])->name('verifikasi');

Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function(){

});



