<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatisticController;


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
    Route::delete('/cancelOrder/{id}', [OrderController::class, "cancelOrder"])->name('cancelOrder');
    Route::post('/addOrders', [OrderController::class, "orders"]);
    Route::get('/printOrder/{id}', [OrderController::class, "printOrder"])->name('printOrder');

    // admin
    Route::get('/admin/statisticAll',[StatisticController::class,'statisticAll'])->name('statisticAll');

    Route::get('/admin/product',[ProductController::class,'index'])->name('product');
    Route::get('/admin/product/create',[ProductController::class,'create'])->name('create-product');
    Route::post('/admin/product/create',[ProductController::class,'store']);
    Route::get('/admin/product/edit/{id}',[ProductController::class,'edit'])->name('edit-product');
    Route::post('/admin/product/edit/{id}',[ProductController::class,'update']);
    Route::get('/admin/product/destroy/{id}',[ProductController::class,'destroy']);
    Route::get('/admin/statistical',[ProductController::class,'statistical']);

    Route::get('/admin/listOrder',[OrderController::class,'listOrder'])->name('listOrder');
    Route::get('/admin/listOrderDetail',[OrderController::class,'listOrderDetail'])->name('listOrderDetail');
    Route::post('/admin/statusOrder/{id}',[OrderController::class,'statusOrder']);


    // Login
    Route::get('/login/dang-nhap-he-thong', [LoginController::class, 'Index'])->name('login');
    Route::get('/login/khoi-phuc-mat-khau', [LoginController::class, 'ForgetLogin']);
    Route::get('/login/dat-lai-mat-khau', [LoginController::class, 'ResetPasswordLog']);
    Route::post('/login/dang-nhap-he-thong-SignIn', [LoginController::class , 'SignIn' ])->middleware('ValidatedLogins');
    Route::post('/login/khoi-phuc-mat-khau-reset', [LoginController::class , 'ResetPassword' ]);
    Route::post('/login/doi-mat-khau-reset', [LoginController::class , 'ResetPasswordDB' ])->middleware('ValidatedLogins');
    Route::post('/login/logout-admin', [LoginController::class , 'Logout' ])->name('logout-admin'); 
});