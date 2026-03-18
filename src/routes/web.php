<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/detail/{product}', [ProductController::class, 'detail'])->name('products.detail');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/register', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/register', [ProductController::class, 'store'])->name('products.store');