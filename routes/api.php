<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;

Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
