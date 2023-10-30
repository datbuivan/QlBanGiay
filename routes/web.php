<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

Route::prefix('QLBanGiay')->group(function() {
    Route::get('/home', [HomeController::class, "products"]);
    Route::get('/{id}/productDetail', [HomeController::class, "productDetail"]);
    Route::get('/cart', [HomeController::class, "carts"]);
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/product',[ProductController::class,'index']);
    Route::get('/admin/product/create',[ProductController::class,'create']);
    Route::post('/admin/product/create',[ProductController::class,'store']);
    Route::get('/admin/product/edit/{id}',[ProductController::class,'edit']);
    Route::put('/admin/product/update/{id}',[ProductController::class,'update']);
    Route::get('/admin/product/destroy/{id}',[ProductController::class,'destroy']);
});
// Route::get('QLBanGiay/productDetail', function () {
//     return view('pages.productDetail');
// })->name("QLBanGiay/productDetail");


