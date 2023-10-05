<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/getuser', function () {
    $result= App\Models\User::all()->toArray();
    echo '<pre>';
    print_r($result);
});
Route::get('/getrole', function () {
    $result= DB::table('roles')->join('users','roles.id' ,'=','users.id')
    ->where('roles.id','1')->select('users.*','roles.*')->get();
    echo '<pre>';
    print_r($result);
});

