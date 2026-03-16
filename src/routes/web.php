<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'detail']);
Route::get('/register', [ProductController::class,'create']);
Route::post('/register', [ProductController::class,'store']);