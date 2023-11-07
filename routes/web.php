<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
Route::prefix('QLBanGiay')->group(function() {
    Route::get('/home', [HomeController::class, "products"]);
    Route::get('/{id}/productDetail', [HomeController::class, "productDetail"]);
    Route::get('/cart', [HomeController::class, "carts"]);

    //product
    Route::get('/admin/product',[ProductController::class,'index'])->name('product');
    Route::get('/admin/product/create',[ProductController::class,'create'])->name('create-product');
    Route::post('/admin/product/create',[ProductController::class,'store']);
    Route::get('/admin/product/edit/{id}',[ProductController::class,'edit'])->name('edit-product');
    Route::post('/admin/product/edit/{id}',[ProductController::class,'update']);
    Route::get('/admin/product/destroy/{id}',[ProductController::class,'destroy']);

    //admin 

    Route::get('/admin/index',[AdminController::class,'index'])->name('admin');
});
// Route::get('QLBanGiay/productDetail', function () {
//     return view('pages.productDetail');
// })->name("QLBanGiay/productDetail");


