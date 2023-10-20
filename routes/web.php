<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;

Route::prefix('QLBanGiay')->name("QLBanGiay.")->group(function() {
    Route::get('/home', [HomeController::class, "products"]);
    Route::get('/{id}/productDetail', [HomeController::class, "productDetail"]);
    Route::get('/cart', [HomeController::class, "carts"]);
    Route::get('/admin',[AdminController::class,'index']);
});
// Route::get('QLBanGiay/productDetail', function () {
//     return view('pages.productDetail');
// })->name("QLBanGiay/productDetail");


