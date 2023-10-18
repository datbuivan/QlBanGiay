<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class HomeController extends Controller
{
    //
    public function products(){
        $getAllProduct = Product::all();
        return view('pages.products')->with('products', $getAllProduct);
    }

    public function productDetail($id){
        // $productDetail = Product::find($id)->productImage()->get();
        // $productDetails = Product::find($id)->productDetails()->get();
        $posts = Product::has('productDetails')->get();

        echo $posts;
        // return view('pages.productDetail')->with('productDetail', $productDetail);
    }

    public function carts(){
        return view('pages.carts');
    }
    
}