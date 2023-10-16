<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function products(){
        return view('pages.products');
    }

    public function productDetail(){
        return view('pages.productDetail');
    }

    public function carts(){
        return view('pages.carts');
    }
    
}