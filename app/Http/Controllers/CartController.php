<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Deliver;


class CartController extends Controller
{
        public function carts(){
                $total = 0;
                $listCarts = Cart::where('customer_id', 1)->get();
                foreach ($listCarts as $listCart){
                        $total += $listCart->export_price * $listCart->quantity;
                }
                return view('pages.carts')
                ->with('total', $total)
                ->with('listCarts', $listCarts);
        }
        
        //
        public function addToCart(Request $request){
                $request->validate([
                        'size' => 'required',
                ]);

                $customMessages = [
                        'size.required' => 'Vui lòng chọn kích thước', 
                ];
                
                $checkCartItem = Cart::where('customer_id', 1)
                ->where('product_id', $request->product_id)
                ->where('color',$request->color)
                ->where('size', $request->size)
                ->first();

                if ($checkCartItem) {
                $checkCartItem->update([
                        'quantity' => $checkCartItem->quantity + $request->quantity,
                ]);
                } else {
                        Cart::create([
                                'name' => $request->nameProduct,
                                'avatar' => $request->avatar,
                                'export_price' => $request->export_price,
                                'quantity' => $request->quantity,
                                'size'=> $request->size,
                                'color' => $request->color,
                                'product_id' => $request->product_id,
                                'customer_id' => 1
                        ]);
                }

            return redirect()->route('QLBanGiay.cart');
        }


        public function deleteCart($id) {
                $deleteCart =  Cart::where('id', $id)->delete();
                return redirect('/QLBanGiay/cart')->with('success', 'Xóa sản phẩm thành công');
        }



        
}