<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;



Route::get('/', [HomeController::class, "products"]);
Route::get('QLBanGiay/productDetail', [HomeController::class, "productDetail"]);
Route::get('QLBanGiay/cart', [HomeController::class, "carts"]);


// Route::get('QLBanGiay/productDetail', function () {
//     return view('pages.productDetail');
// })->name("QLBanGiay/productDetail");