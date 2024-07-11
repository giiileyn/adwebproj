<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SellerController;


Route::get('/', function () {
    return view('welcome');
});

//admin
Route::view("/admin/signin","admin.auth.signin")->name("admin.signin");
Route::view("/admin/index","admin.index")->name("admin.index");
Route::view("/admin/clients-table","admin.clients-table")->name("admin.clients-table");
Route::view("/admin/sellers-table","admin.sellers-table")->name("admin.sellers-table");

// Route::middleware('auth:seller')->group(function () {
Route::view("/seller/signup","seller.auth.signup")->name("seller.signup");
Route::view("/seller/signin","seller.auth.signin")->name("seller.signin");
Route::view("/seller/index","seller.index")->name("seller.index");
Route::view("/seller/profile","seller.profile")->name("seller.profile");
Route::view("/seller/categories","seller.categories")->name("seller.categories");
// });


Route::post('/seller/signin', [LoginController::class, 'loginseller'])->name('seller.login');
Route::post('/admin/signin', [LoginController::class, 'loginadmin'])->name('admin.login');
Route::put('/admin/clientUpdateStat/{id}', [ClientController::class, 'updateStatus'])->name('admin.clientUpdateStat');
Route::put('/admin/sellerUpdateStat/{id}', [SellerController::class, 'updateStatus'])->name('admin.sellerUpdateStat');



//Client
Route::view("/client/signup","client.auth.signup")->name("client.signup");
Route::view("/client/index","client.index")->name("client.index");

