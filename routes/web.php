<?php

use Src\Routing\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('home', [HomeController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products/store', [ProductController::class, 'store']);