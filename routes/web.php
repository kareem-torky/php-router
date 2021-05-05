<?php

use Src\Routing\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('home', [HomeController::class, 'index'])
    ->name('home.index');

Route::get('products', [ProductController::class, 'index'])
    ->name('products.index')
    ->middleware(['test']);

Route::get('products/create', [ProductController::class, 'create'])
    ->name('products.create')
    ->middleware(['test', 'another-test']);

Route::post('products/store', [ProductController::class, 'store'])
    ->name('products.store');