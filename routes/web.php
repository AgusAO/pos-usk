<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
    Route::post('first_akun', 'firstAkun');
    Route::get('account', 'viewAkun');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('beranda', Beranda::class);
        Route::resource('kategori',  KategoriController::class);
        Route::resource('penjualan',  PenjualanController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('penjualan', PenjualanController::class);
    });
});
