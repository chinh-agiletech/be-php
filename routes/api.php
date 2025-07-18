<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\VoucherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;

Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('vouchers', VoucherController::class);
Route::resource('products', ProductController::class);
