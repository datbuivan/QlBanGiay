<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Cart;
use App\Models\TypeProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Deliver;
use App\Models\Review;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function products(Request $request){
        $search = $request->input('searchProduct');
        $proPage=8;
        $getProductTypes = TypeProduct::all();
        if($search){
            $getAllProduct = Product::where('name', 'like', '%'.$search.'%')->paginate($proPage);
        }else{
            $getAllProduct = Product::with([
                'productDetails' 
            ])->paginate($proPage);
        }

        return view('pages.products')
        ->with('nameProductTypes', $getProductTypes)
        ->with('search', $search)
        ->with('products', $getAllProduct);
    }

    public function productType($id,Request $request){
        $search = $request->input('searchProduct');
        $getProductTypes = TypeProduct::all();

        if($search){
            $productType = TypeProduct::with([
                'product' => function ($query) {
                    $query->where('name', 'like', '%'.$search.'%');
                },
            ])->get();
        }else{
            $productType = TypeProduct::with([
                'product' => function ($query) use ($id){
                    $query->where('type_product_id', '=', $id);
                },
            ])->find($id);
        }

        $nameProductType = TypeProduct::select('name')
            ->where('id', $id)
            ->first();

        return view('pages.productTypes')
        ->with('nameProductType', $nameProductType)
        ->with('nameProductTypes', $getProductTypes)
        ->with('productTypes', $productType);
    }

    public function productDetail($id){
            $productDetails = Product::with([
                'colors',
                'productImages',
                'productDetails'
            ])->find($id);
            if($productDetails){
                $similarProducts = Product::where('type_product_id', $productDetails->type_product_id)->get();
                
                $productSizes = Product::select( 'products.name',"product_details.*", 'sizes.name as nameSize',)
                ->leftJoin('product_details', 'products.id', '=', 'product_details.product_id')
                ->leftJoin('sizes', 'sizes.id', '=', 'product_details.size_id')
                ->where('product_details.product_id', '=', $id)
                ->orderBy('nameSize', 'asc')
                ->get();
            
                $listReviews = Product::with([
                    'reviews.user' => function ($query) {
                        $query->select('id', 'name', );
                }])->select('id' ,'name')->find($id);
        
                return view('pages.productDetail')
                ->with('listReviews', $listReviews)
                ->with('similarProducts', $similarProducts)
                ->with('productSizes', $productSizes)
                ->with('productDetails', $productDetails);
            }
            else{
                abort(404);
            }
    }

    public function reviews($id){
            $listReviews = OrderDetail::with([
                'product.reviews'
            ])->find($id);
            
            return view('pages.review')
            ->with('listReviews', $listReviews);
    }

    public function ratingStar(Request $request){
        $user = Session::get('user');
        $checkReview = Review::where('user_id', $user->id)
        ->where('product_id', $request->productId)
        ->first();

        if(!$checkReview){
            $reviews = Review::create([
                'rate' => $request->ratingstar,
                'product_id' => $request->productId,
                'comment'=> $request->comment,
                'user_id' => $user->id
            ]);
        }
        else{
            $reviews = Review::where('user_id',  $user->id)
            ->where('product_id', $request->productId)
            ->update([
                'rate' => $request->ratingstar,
                'product_id' => $request->productId,
                'comment'=> $request->comment,
            ]);
        }
        
        if ($reviews){
            $reviewCount = Review::where("product_id", $request->productId)->count();
            $totalRatingStar = Review::where("product_id", $request->productId)->sum('rate');
            $TBRatingStar = $totalRatingStar/$reviewCount;

            Product::where('id', $request->productId)->update([
                'reviews' => $reviewCount,
                'total_reviews' => $TBRatingStar,
            ]);
            return redirect()->route('QLBanGiay.directCard')->with('success', 'Đánh giá thành công');
        }

    }
  

}