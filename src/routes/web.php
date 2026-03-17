<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'detail'])->name('products.detail');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/register', [ProductController::class, 'create'])->name('products.create');
Route::post('/register', [ProductController::class, 'store'])->name('products.store');