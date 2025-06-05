<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
