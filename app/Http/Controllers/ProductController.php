<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\TypeProduct;
use App\Models\Gender;
use App\Models\Design;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\ProductRequest;
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

    public function store(ProductRequest $request){
        if($request->has('avatar')){
            $file= $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move(base_path('/resources/assets/Image'),$filename);
        }
        $product = Product::create([
            'name'=>$request->name,
            'import_price'=>$request->import_price,
            'export_price'=>$request->export_price,
            'discount'=>$request->discount,
            'avatar'=>$filename,
            'description'=>$request->description,
            'product_status'=>$request->product_status,
            'hot_status'=>$request->hot_status,
            'best_seller_status'=> $request->best_seller_status,
            'color_id'=>$request->color_id,
            'type_product_id'=>$request->type_product_id,
            'design_id'=>$request->design_id,
            'gender_id'=>$request->gender_id,
        ]);
        return redirect()->route('product');
    }
    public function edit($id){
        if($id == null){
            abort(404, 'Page not found');
        }
        $product = Product::with(
            'colors',
            'design',
            'gender',
            'typeProduct',
        )->find($id);
        if($product==null){
            abort(404, 'Page not found');
        }
        $colors = Color::orderBy('name','ASC')->select('id','name')->get();
        $genders = Gender::orderBy('name','ASC')->select('id','name')->get();
        $typeproducts = TypeProduct::orderBy('name','ASC')->select('id','name')->get();
        $designs = Design::orderBy('name','ASC')->select('id','name')->get();
        return view('Admin.Product.edit',compact('product','colors','genders','typeproducts','designs'));   
    }

    public function update(ProductRequest $request , $id ){
        $product = Product::find($id);
        if($product == null){
            abort(404, 'Page not found');
        }
        if($request->has('avatar')){
            $file= $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move(base_path('/resources/assets/Image'),$filename);
        }
        else{
            $filename = $product->avatar;
        }
        $productUpdate =Product::find($id)->update([
            'name'=>$request->name,
            'import_price'=>$request->import_price,
            'export_price'=>$request->export_price,
            'discount'=>$request->discount,
            'avatar'=>$filename,
            'desciption'=>$request->description,
            'product_status'=>$request->product_status,
            'hot_status'=>$request->hot_status,
            'best_seller_status'=> $request->best_seller_status,
            'color_id'=>$request->color_id,
            'type_product_id'=>$request->type_product_id,
            'design_id'=>$request->design_id,
            'gender_id'=>$request->gender_id,
        ]);
        return Redirect()->route('product');
    }

    public function destroy($id){
        if($id == null){
            abort(404, 'Page not found');
        }

        $product= Product::with(
            'order',
            'purchases',
            'productDetails',
            'reviews'
        )->find($id);
        
        if($product == null){
            abort(404, 'Page not found');
        }
        dd($product);
        //return view('Admin.Product.delete',compact('product'));
    } 
}
