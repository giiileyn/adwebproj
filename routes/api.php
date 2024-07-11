<?php

use App\Http\Controllers\SellerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("sellers", SellerController::class);
Route::apiResource("clients", ClientController::class);
