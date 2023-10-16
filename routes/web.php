<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('pages.products');
});

Route::get('QLBanGiay/productDetail', function () {
    return view('pages.productDetail');
})->name("QLBanGiay/productDetail");





// Route::get('/getuser', function () {
//     $result= App\Models\User::all()->toArray();
//     echo '<pre>';
//     print_r($result);
// });
// Route::get('/getrole', function () {
//     $result= DB::table('roles')->join('users','roles.id' ,'=','users.id')
//     ->where('roles.id','1')->select('users.*','roles.*')->get();
//     echo '<pre>';
//     print_r($result);
// });