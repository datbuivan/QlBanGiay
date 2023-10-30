<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\TypeProduct;
use App\Models\Gender;
use App\Models\Design;
use Illuminate\Pagination\Paginator;
// use App\Http\Controllers\Request\ProductRequest;
class ProductController extends Controller
{
    //
    public function index(){
        $proPage=5;
        $products = Product::select('id','name','import_price','export_price','avatar')->orderBy('name','ASC')->paginate($proPage);
        $productIndex = ($products->currentPage() - $products->currentPage() +1 ) * $products->firstItem();
        return view('Admin.Product.index',compact('products','productIndex'));  
    }

    public function create(){
        $colors = Color::orderBy('name','ASC')->select('id','name')->get();
        $genders = Gender::orderBy('name','ASC')->select('id','name')->get();
        $typeproducts = TypeProduct::orderBy('name','ASC')->select('id','name')->get();
        $designs = Design::orderBy('name','ASC')->select('id','name')->get();
        return view('Admin.Product.create',compact('colors','genders','typeproducts','designs'));
    }

    public function store(Request $request){
        // $product = Product::create([
        //     'name'=>$request->name,
        //     'import_price'=>$request->import_price,
        //     'export_price'=>$request->export_price,
        //     'discount'=>$request->discount,
        //     'product_status'=>$request->product_status,
        //     'hot_status'=>$request->hot_status,
        //     'best_seller_status'=> $request->best_seller_status,
        //     'color_id'=>$request->color_id,
        //     'type_product_id'=>$request->type_product_id,
        //     'design_id'=>$request->design_id,
        //     'gender_id'=>$request->gender_id,
        // ]);
        // return Redirect('Admin.Product.create');

        dd($request->all());
    }
    public function edit($id){
        if($id == null){
            abort(404, 'Page not found');
        }
        $product = Product::find($id);
        if($product==null){
            abort(404, 'Page not found');
        }
        $colors = Color::orderBy('name','ASC')->select('id','name')->get();
        $genders = Gender::orderBy('name','ASC')->select('id','name')->get();
        $typeproducts = TypeProduct::orderBy('name','ASC')->select('id','name')->get();
        $designs = Design::orderBy('name','ASC')->select('id','name')->get();
        return view('Admin.Product.edit',compact('product','colors','genders','typeproducts','designs'));
        
    }

    public function update(){

    }

    public function destroy($id){
        if($id == null){
            abort(404, 'Page not found');
        }
        $product= Product::where('id',$id)->select('id','name')->get();
        if($product == null){
            abort(404, 'Page not found');
        }
        return view('Admin.Product.delete',compact('product'));
    } 
}
