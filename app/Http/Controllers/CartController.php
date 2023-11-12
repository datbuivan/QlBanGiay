<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Deliver;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
        public function carts(){
                $user = Session::get('user');
                if($user){
                        $total = 0;
                        $listCarts = Cart::where('customer_id', $user->id)->get();
                        foreach ($listCarts as $listCart){
                                $total += $listCart->export_price * $listCart->quantity;
                        }
                        Session::put('cartCount' , $listCarts->count());
                        $cartCount = Session::get('cartCount');
                        if($cartCount !== $listCarts->count()){
                                Session::put('cartCount' , $listCarts->count());
                        }
                        return view('pages.carts')
                        ->with('total', $total)
                        ->with('listCarts', $listCarts);
                }else{
                        return redirect()->route('QLBanGiay.login');
                }
        }


        //
        public function addToCart(Request $request){
                $user = Session::get('user');
                if($user && $user->role_id === 3){
                        $request->validate([
                                'size' => 'required',
                        ]);
        
                        $customMessages = [
                                'size.required' => 'Vui lòng chọn kích thước', 
                        ];
                        
                        $checkCartItem = Cart::where('customer_id', $user->id)
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
                                        'customer_id' => $user->id,
                                ]);
                        }
                    return redirect()->route('QLBanGiay.cart');
                }else{
                    return redirect()->route('QLBanGiay.login');
                }
        }



      

        public function deleteCart($id) {
                $deleteCart =  Cart::where('id', $id)->delete();
                return redirect('/QLBanGiay/cart')->with('success', 'Xóa sản phẩm thành công');
        }

        
}