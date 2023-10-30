<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::prefix('QLBanGiay')->name("QLBanGiay.")->group(function() {
    Route::get('/home', [HomeController::class, "products"]);
    Route::get('/{id}/productDetail', [HomeController::class, "productDetail"]);
    Route::get('home/{id}', [HomeController::class, "productType"]);
    Route::get('/review/{id}', [HomeController::class, "reviews"])->name('reviews');
    Route::post('/ratingStar', [HomeController::class, "ratingStar"]);
    Route::get('/cart', [CartController::class, "carts"])->name('cart');
    Route::post('/addCart', [CartController::class, 'addToCart']);
    Route::delete('/{id}/deleteCart', [CartController::class, 'deleteCart']);
    Route::get('/orders', [OrderController::class, "getOrders"])->name('orders');
    Route::get('/directCard', [OrderController::class, "directCard"])->name('directCard');
    Route::post('/addOrders', [OrderController::class, "orders"]);
    
});