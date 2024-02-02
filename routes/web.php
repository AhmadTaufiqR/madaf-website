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

Route::prefix('register-user-developerPembuatAplikasiTambahOwner')->group(function () {
    Route::get('/', [OwnerController::class, 'view_regist'])->middleware('isHome');
    Route::post('check-owner', [OwnerController::class, 'add_owner']);  
});

Route::prefix('register-user-pengurus')->group(function () {
    Route::post('check', [OwnerController::class, 'addPengurus'])->middleware('isLogin');
    Route::post('check/excel', [OwnerController::class, 'addPengurusExcel'])->middleware('isLogin');
    Route::post('update/{id}', [OwnerController::class, 'updatePengurus'])->middleware('isLogin');
    Route::post('update-password/{id}', [OwnerController::class, 'updatePasswordPengurus'])->middleware('isLogin');
    Route::delete('delete/{id}', [OwnerController::class, 'destroyPengurus'])->middleware('isLogin');
});

Route::prefix('register-user-santri')->group(function () {
    Route::post('check', [OwnerController::class, 'addSantri'])->middleware('isLogin');
    Route::post('check/excel', [OwnerController::class, 'addSantriExcel'])->middleware('isLogin');
    Route::post('update/{id}', [OwnerController::class, 'updateSantri'])->middleware('isLogin');
    Route::post('update-balance/{id}', [OwnerController::class, 'updateBalanceSantri'])->middleware('isLogin');
    Route::post('withdraw-balance/{id}', [OwnerController::class, 'withdrawBalanceSantri'])->middleware('isLogin');
    Route::post('update-password/{id}', [OwnerController::class, 'updatePasswordSantri'])->middleware('isLogin');
    Route::delete('delete/{id}', [OwnerController::class, 'destroySantri'])->middleware('isLogin');
});

Route::prefix('register-user-kasir')->group(function () {
    Route::post('check', [OwnerController::class, 'addKasir'])->middleware('isLogin');
    Route::post('update/{id}', [OwnerController::class, 'updateKasir'])->middleware('isLogin');
    Route::post('update-password/{id}', [OwnerController::class, 'updatePasswordKasir'])->middleware('isLogin');
    Route::delete('delete/{id}', [OwnerController::class, 'destroyKasir'])->middleware('isLogin');
});

Route::prefix('register-koperasi')->group(function () {
    Route::post('check', [OwnerController::class, 'addingKoperasi'])->middleware('isLogin');
    Route::post('update-koperasi/{id}', [OwnerController::class, 'updateKoperasi'])->middleware('isLogin');
    Route::delete('delete-koperasi/{id}', [OwnerController::class, 'destroyKoperasi'])->middleware('isLogin');
});

Route::prefix('payment-infaq')->group(function () {
    Route::post('check', [OwnerController::class, 'addingInfaq'])->middleware('isLogin');
    Route::post('update-payment-infaq/{id}', [OwnerController::class, 'editInfaq'])->middleware('isLogin');
    Route::delete('delete-payment-infaq/{id}', [OwnerController::class, 'deleteInfaq'])->middleware('isLogin');
});

Route::prefix('eat-payment')->group(function () {
    Route::post('check', [OwnerController::class, 'addingMakan'])->middleware('isLogin');
    Route::post('update-eat-payment/{id}', [OwnerController::class, 'editMakan'])->middleware('isLogin');
    Route::delete('delete-eat-payment/{id}', [OwnerController::class, 'deleteMakan'])->middleware('isLogin');
});

Route::get('logout', [AuthController::class, 'logout']);
