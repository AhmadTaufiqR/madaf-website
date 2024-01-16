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

// Route::get('/', [viewPageController::class, 'landing_view']);
Route::get('/', [AuthController::class, 'index_login'])->middleware('isHome');


Route::middleware(['isLogin'])->group(function () {
    Route::get('dashboard', [viewPageController::class, 'dash_view']);
    Route::get('santri', [viewPageController::class, 'santriView']);
    Route::get('pengurus', [viewPageController::class, 'pengurusView']);
    Route::get('koperasi', [viewPageController::class, 'koperasiView']);
    // Route::get('product-in', [viewPageController::class, 'product_in_view']);
    // Route::get('users', [viewPageController::class, 'users_view']);
    // Route::get('product-out', [viewPageController::class, 'product_out_view']);
    // Route::get('stok', [viewPageController::class, 'stok_view']);
    // Route::get('store', [viewPageController::class, 'store_view']);
    // Route::get('report', [viewPageController::class, 'report_view']);
});

// Route::middleware(['isLogin'])->group(function () {
//     Route::get('toko-admin', [viewPageController::class, 'store_view_admin']);
//     Route::get('barang-admin', [viewPageController::class, 'stok_view_admin']);
//     Route::get('product-in-admin', [viewPageController::class, 'product_in_view_admin']);
//     Route::get('product-out-admin', [viewPageController::class, 'product_out_view_admin']);
// });

// Route::get('get-profile', [OwnerController::class, 'growUp']);

Route::prefix('login')->group(function () {
    // Route::get('/', [AuthController::class, 'index_login'])->middleware('isHome');
    Route::post('check', [AuthController::class, 'check_login'])->middleware('isHome');
});

// Route::prefix('register-user-developerPembuatAplikasiTambahOwner')->group(function () {
//     Route::get('/', [OwnerController::class, 'view_regist'])->middleware('isHome');
//     Route::post('check-owner', [OwnerController::class, 'add_owner']);  
// });

Route::prefix('register-user')->group(function () {
    Route::post('check', [OwnerController::class, 'add_admin'])->middleware('isLogin');
    Route::post('update/{id}', [OwnerController::class, 'update'])->middleware('isLogin');
    Route::post('update-password/{id}', [OwnerController::class, 'update_password'])->middleware('isLogin');
    Route::delete('delete/{id}', [OwnerController::class, 'destroy'])->middleware('isLogin')->name('users.destroy');
});

// Route::prefix('product-in')->group(function () {
//     Route::post('add-product', [AdminController::class, 'add_barang_masuk'])->middleware('isLogin');
//     Route::post('update-product/{id}', [AdminController::class, 'edit_ins'])->middleware('isLogin');
//     Route::delete('delete-product/{id}', [AdminController::class, 'delete_product_in'])->middleware('isLogin');
// });
// Route::prefix('stores')->group(function () {
//     Route::post('add-stores', [AdminController::class, 'adding_stores'])->middleware('isLogin');
//     Route::post('update-stores/{id}', [AdminController::class, 'edit_store'])->middleware('isLogin');
//     Route::delete('delete-stores/{id}', [AdminController::class, 'delete_store'])->middleware('isLogin');
// });
// Route::prefix('products')->group(function () {
//     Route::delete('delete-product/{id}', [AdminController::class, 'delete_product'])->middleware('isLogin');
// });
// Route::prefix('product-out')->group(function () {
//     Route::post('add-out', [AdminController::class, 'add_product_out'])->middleware('isLogin');
//     Route::post('edit-out/{id}', [AdminController::class, 'edit_product_out'])->middleware('isLogin');
//     Route::post('add-product-out/{id}', [AdminController::class, 'add_product_on_product_out'])->middleware('isLogin');
//     Route::delete('delete-out/{id}', [AdminController::class, 'delete_product_out'])->middleware('isLogin');
// });

Route::get('logout', [AuthController::class, 'logout']);
