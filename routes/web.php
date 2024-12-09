<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Person\OrderController as PersonOrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\ResetController;

// Route::get('/test/env', function () {
//     dd(env('DB_DATABASE')); // Dump 'db' variable value one by one
// });

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);

Route::get('reset', [ResetController::class, 'reset'])->name('reset');

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::middleware(['auth'])->group(function(){
    Route::group([              
        'prefix' => 'person',
        'as' => 'person.',
    ], function(){
        Route::get('/orders', [PersonOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [PersonOrderController::class, 'show'])->name('orders.show');
    });

    Route::group([
        'prefix' => 'admin',
    ], function(){
        Route::group(['middleware'=>'is_admin'], function(){
            Route::get('/orders', [AdminOrderController::class, 'index'])->name('home');
            Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        });  
        
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
});

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::group(['prefix'=> 'basket'], function(){
    Route::post('/add/{product}', [BasketController::class, 'basketAdd'])->name('basket-add');

    Route::group([
        'middleware'=>'basket_not_empty',    
    ], function(){
        Route::get('/', [BasketController::class, 'basket'])->name('basket');
        Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');    
        Route::post('/remove/{product}', [BasketController::class, 'basketRemove'])->name('basket-remove');
        Route::post('/place', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
    });
});

Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');
Auth::routes();
