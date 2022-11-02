<?php

use App\Http\Controllers\AuthController;
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
    return view('homepage');
});

Route::post('/login', [AuthController::class, 'index'])->name('login');
Route::post('/daftar_ortu',[AuthController::class, 'daftar_ortu'])->name('daftar_ortu');

Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function(){

});
    Route::post('/login', [AuthController::class, 'index'])->name('login');


