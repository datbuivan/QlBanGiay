<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Deliver;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

        public function getOrders(Request $request){
                $user = Session::get('user');
                if($user){
                        $total = 0;
                        $listCarts = Cart::where('customer_id', $user->id)->get();
                        foreach ($listCarts as $listCart){
                                $total += $listCart->export_price * $listCart->quantity;
                        }
                        $delivers = Deliver::all(); 
                        return view('pages.orders')
                        ->with('total', $total)
                        ->with('delivers', $delivers)
                        ->with('listCarts', $listCarts);
                }else{
                        return redirect()->route('QLBanGiay.login');
                }
        }


        public function orders(Request $request){
                $request->validate([
                        'CustomerName' => 'required',
                        'ThanhToan' => 'required',
                        'Email' => 'required',
                        'Phone' => 'required',
                        'Address' => 'required',
                        'deliver' => 'required',
                    ]);

                $customMessages = [
                        'CustomerName.required' => 'Vui lòng nhập tên', 
                        'ThanhToan.required' => 'Vui lòng chọn phương thức thanh toán', 
                        'Email.required' => 'Vui lòng nhập email', 
                        'Phone.required' => 'Vui lòng nhập số điện thoại', 
                        'Address.required' => 'Vui lòng nhập địa chỉ', 
                        'deliver.required' => 'Vui lòng chọn phương thức vận chuyển', 
                    ];

                $order = Order::create([
                        'full_name' => $request->CustomerName,
                        'pay_method' => $request->ThanhToan,
                        'email' => $request->Email,
                        'phone_number' => $request->Phone,
                        'address'=> $request->Address,
                        'status' => 'Chờ xác nhận',
                        'customer_id' => 1,
                        'deliver_id'=> $request->deliver
                ]);


                if($order){
                        $listCarts = $request->input('listCart');
                        foreach ($listCarts as $listCart) {
                                $orderDetails = OrderDetail::create([
                                        'quantity' => $listCart['quantity'],
                                        'product_id' => $listCart['product_id'],
                                        'price' => $listCart['export_price'],
                                        'order_id' => $order->id,
                                        'size'=>$listCart['size'],
                                        'avatar'=>$listCart['avatar'],
                                ]);
                            }
                }

                if($order && $orderDetails){
                        $listCarts = $request->input('listCart');
                        foreach ($listCarts as $listCart) {
                                $deleteCart =  Cart::where('product_id', $listCart['product_id'])
                                ->where('customer_id', $order->customer_id)
                                ->where('size', $listCart['size'])
                                ->delete();
                            }
                }
                
                return redirect()->route('QLBanGiay.orders')->with('success', 'Đặt hàng thành công');
        }

        public function directCard(){
             $directCards = Order::with([
                'delivers',
                'orderDetails.product' => function ($query) {
                        $query->select('id', 'name', );
                }])->where('customer_id',1)->get();

                return view('pages.directCard')
                ->with('directCards', $directCards);
        }


        public function listOrder(){
                $proPage=8;
                $listOders = Order::paginate($proPage);
                return view('Admin.Order.listOrder')
                ->with('listOders',$listOders);
        }

        public function listOrderDetail(){
                $proPage=5;
                $listOrderDetails = Order::with([
                        'delivers',
                        'orderDetails.product' => function ($query) {
                                $query->select('id', 'name');
                        }
                ])->select('id', 'full_name', 'deliver_id')->paginate($proPage);
                return view('Admin.Order.listOrderDetail')
                ->with('listOrderDetails', $listOrderDetails);
        }

        public function statusOrder($id){
                $Orders= Order::where('id',$id)->get();
                if($id){
                        Order::where('id', $id)->update([
                                'status' => 'Đã xác nhận',
                            ]);
                }else{
                        abort(404, 'Page not found');
                }

                return redirect()->route('QLBanGiay.listOrder')->with('success', 'Xác nhận đơn hàng thành công');
        }
        
}