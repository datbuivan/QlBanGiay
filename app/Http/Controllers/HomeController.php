<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Cart;
use App\Models\TypeProduct;

class HomeController extends Controller
{
    //
    public function products(){
        $getProductTypes = TypeProduct::all();
        $getAllProduct = Product::with([
            'productDetails' 
        ])->get();
        return view('pages.products')
        ->with('nameProductTypes', $getProductTypes)
        ->with('products', $getAllProduct);
    }

    public function productType($id){
        $getProductTypes = TypeProduct::all();
        $productType = TypeProduct::with([
            'product' => function ($query) use ($id){
                $query->where('type_product_id', '=', $id);
            },
        ])->find($id);
        $nameProductType = TypeProduct::select('name')
            ->where('id', $id)
            ->first();
        return view('pages.productTypes')
        ->with('nameProductType', $nameProductType)
        ->with('nameProductTypes', $getProductTypes)
        ->with('productTypes', $productType);
    }

    public function productDetail($id){
        // $productDetails = Product::with([
        //     'productDetails' => function ($query) use ($id){
        //         $query->where('product_id', '=', $id);
        //     },
        //     "typeProduct"
        // ])->find($id);

        $productDetails = Product::with([
            'colors',
            'productImages',
            'productDetails'
        ])->find($id);


        $productSizes = Product::select( 'products.name',"product_details.*", 'sizes.name as nameSize',)
            ->leftJoin('product_details', 'products.id', '=', 'product_details.product_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_details.size_id')
            ->where('product_details.product_id', '=', $id)
            ->orderBy('nameSize', 'asc')
            ->get();
           
        return view('pages.productDetail')
        ->with('productSizes', $productSizes)
        ->with('productDetails', $productDetails);
    }

  

}