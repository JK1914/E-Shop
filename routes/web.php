<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/test/env', function () {
//     dd(env('DB_DATABASE')); // Dump 'db' variable value one by one
// });

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');

Route::get('/basket', [MainController::class, 'basket'])->name('basket');

Route::get('/basket/place', [MainController::class], 'basketPlace')->name('basket-place');
