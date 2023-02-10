<?php

use App\Http\Controllers\AkunManageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\profileManageController;

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
});

Route::controller(AkunManageController::class)->group(function () {
    Route::post('first_akun', 'firstAkun');
    Route::get('account/new', 'viewNewAccount');
    Route::post('account/create', 'createAccount');
    Route::get('account/delete/{id}', 'deleteAccount');

    // Route::get('account', 'viewAkun');
});

Route::controller(profileManageController::class)->group(function () {
    Route::get('/profile', 'viewProfile');

    // Route::get('account', 'viewAkun');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::resource('account', AkunManageController::class);
        Route::resource('beranda', Beranda::class);
        Route::resource('kategori',  KategoriController::class);
        Route::resource('penjualan',  PenjualanController::class);
    });

    // Route::get('account/new', [AkunManageController::class, 'viewNewAccount']);

    Route::group(['middleware' => ['cekUserLogin:kasir']], function () {
        Route::resource('penjualan', PenjualanController::class);
        Route::resource('account', AkunManageController::class);
    });
});
