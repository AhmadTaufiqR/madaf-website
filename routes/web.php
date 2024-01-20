<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\viewPageController;
use Carbon\Carbon;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Date;
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

Route::get('/', [AuthController::class, 'index_login'])->middleware('isHome');


Route::middleware(['isLogin'])->group(function () {
    Route::get('dashboard', [viewPageController::class, 'dash_view']);
    Route::get('santri', [viewPageController::class, 'santriView']);
    Route::get('pengurus', [viewPageController::class, 'pengurusView']);
    Route::get('koperasi', [viewPageController::class, 'koperasiView']);
    Route::get('kasir', [viewPageController::class, 'kasirView']);
    Route::get('infaq', [viewPageController::class, 'infaqView']);
    Route::get('uang-makan', [viewPageController::class, 'uangMakanView']);
    Route::get('pembayaran', [viewPageController::class, 'pembayaranView']);
});


Route::prefix('login')->group(function () {
    Route::post('check', [AuthController::class, 'check_login'])->middleware('isHome');
});

// Route::prefix('register-user-developerPembuatAplikasiTambahOwner')->group(function () {
//     Route::get('/', [OwnerController::class, 'view_regist'])->middleware('isHome');
//     Route::post('check-owner', [OwnerController::class, 'add_owner']);  
// });

Route::prefix('register-user-pengurus')->group(function () {
    Route::post('check', [OwnerController::class, 'add_pengurus'])->middleware('isLogin');
    Route::post('update/{id}', [OwnerController::class, 'update_pengurus'])->middleware('isLogin');
    Route::post('update-password/{id}', [OwnerController::class, 'update_password_pengurus'])->middleware('isLogin');
    Route::delete('delete/{id}', [OwnerController::class, 'destroy_pengurus'])->middleware('isLogin')->name('users.destroy');
});

Route::prefix('register-user-santri')->group(function () {
    Route::post('check', [OwnerController::class, 'add_santri'])->middleware('isLogin');
    Route::post('update/{id}', [OwnerController::class, 'update_santri'])->middleware('isLogin');
    Route::post('update-password/{id}', [OwnerController::class, 'update_password_santri'])->middleware('isLogin');
    Route::delete('delete/{id}', [OwnerController::class, 'destroy_santri'])->middleware('isLogin')->name('users.destroy');
});

Route::prefix('register-user-kasir')->group(function () {
    Route::post('check', [OwnerController::class, 'add_kasir'])->middleware('isLogin');
    Route::post('update/{id}', [OwnerController::class, 'update_kasir'])->middleware('isLogin');
    Route::post('update-password/{id}', [OwnerController::class, 'update_password_kasir'])->middleware('isLogin');
    Route::delete('delete/{id}', [OwnerController::class, 'destroy_kasir'])->middleware('isLogin')->name('users.destroy');
});

Route::prefix('register-user-koperasi')->group(function () {
    Route::post('check', [OwnerController::class, 'adding_koperasi'])->middleware('isLogin');
    Route::post('update-koperasi/{id}', [OwnerController::class, 'edit_koperasi'])->middleware('isLogin');
    Route::delete('delete-koperasi/{id}', [OwnerController::class, 'delete_koperasi'])->middleware('isLogin');
});

Route::get('logout', [AuthController::class, 'logout']);
