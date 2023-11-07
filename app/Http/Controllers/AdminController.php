<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Color;
use App\Models\TypeProduct;
use App\Models\Gender;
use App\Models\Design;
class AdminController extends Controller
{
    public function index(){
        $product_count = Product::where('product_status',true)->count();
        $order_count = Order::count();
        $Earnings_month = 12000000;
        $Earnings_year = 200000000;
        $orders = Order::orderBy('created_at', 'DESC')->get()->take(10);
        return view('Admin.index',compact('product_count','order_count','Earnings_month','Earnings_year','orders'));
    }
}
