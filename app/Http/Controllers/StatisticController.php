<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\TypeProduct;
use App\Models\Gender;
use App\Models\Design;
use Illuminate\Pagination\Paginator;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\ProductRequest;
class StatisticController extends Controller
{
    public function statisticAll(){
        $listOders = Order::all();
        $listProductTypes = TypeProduct::all();
        return view('Admin.Statistic.statisticAll')
        ->with('listProductTypes',$listProductTypes)
        ->with('listOders',$listOders);
    }
}