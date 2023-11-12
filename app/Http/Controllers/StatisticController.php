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
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function statisticAll(Request $request){
        $proPage=8;
        $bestSellProducts = null;
        $listProductTypes = TypeProduct::all();
        $revenuas =  OrderDetail::whereHas('orders', function($query){
            $query->where('status', '=', 'Đã xác nhận');
        })->get();

        $revenuaStutus =  OrderDetail::whereHas('orders', function($query){
            $query->where('status', '=', 'Chờ xác nhận');
        })->get();

        
        $listOrders = OrderDetail::whereHas('product', function ($query){
            $query->select('id','name','type_product_id');
        })->whereHas('orders', function($query){
            $query->where('status', '=', 'Đã xác nhận');
        })->paginate($proPage);
      
        if($request->methodStatistic === 'thống kê theo ngày'){
            // kiểm tra ngày
            $date1 = Carbon::parse($request->toDate);
            $date2 = Carbon::parse($request->fromDate);
            if ($date1->gt($date2)){
                $listOrders = OrderDetail::whereHas('product', function ($query){
                    $query->select('id','name','type_product_id');
                })->whereHas('orders', function($query){
                    $query->where('status', '=', 'Đã xác nhận');
                })->whereBetween('created_at', [$request->fromDate, $request->toDate])->paginate($proPage);
            }else{
                abort(404, 'Page not found');
            }
        }else if($request->methodStatistic === 'thống kê loại sản phẩm theo ngày'){
            $listOrders = OrderDetail::whereHas('product',function ($query) use ($request){
                $query->select('id','name','type_product_id')->where('type_product_id', '=', $request->productType);
            })->whereHas('orders', function($query){
                $query->where('status', '=', 'Đã xác nhận');
            })->whereDate('created_at', $request->date)->paginate($proPage);
        }else if($request->methodStatistic === 'thống kê sản phẩm bán chạy theo tháng'){
            $bestSellProducts = Product::select('products.*', \DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereMonth('orders.created_at', $request->month)
            ->whereYear('orders.created_at', $request->year)
            ->groupBy('products.id')
            ->orderByDesc('total_quantity')
            ->take(3) 
            ->get();
        }else if($request->methodStatistic === 'thống kê tất cả sản phẩm'){
            $listOrders = OrderDetail::with(['product'=> function ($query)  {
                $query->select('id','name','type_product_id');
            }])->whereHas('orders', function($query){
                $query->where('status', '=', 'Đã xác nhận');
            })->paginate($proPage);
        }
      

        return view('Admin.Statistic.statisticAll')
        ->with('revenuaStutus', $revenuaStutus)
        ->with('revenuas', $revenuas)
        ->with('listProductTypes',$listProductTypes)
        ->with('bestSellProducts',$bestSellProducts)
        ->with('listOrders',$listOrders);
    }
}