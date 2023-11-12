<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{

    public function getCustomers(Request $request) {
        $user = Session::get('user');
        if($user){
            $totalItemOptions = [
                5 => '5',
                10 => '10',
                15 => '15',
                'all' => 'Tất cả'
            ];
            $statusOptions = [
                '' => 'Lọc trạng thái',
                'chua xac minh' => 'Chưa xác minh',
                'hoat dong' => 'Hoạt động',
                'khoa' => 'Khóa',
            ];
            $priceOptions = [
                '' => 'Lọc tiền thanh toán',
                '0-1000000' => '0 - 1tr',
                '1000000-5000000' => '1tr - 5tr',
                '5000000-10000000' => '5tr - 10tr',
                '10000000' => 'Trên 10tr',
            ];
            ////////////////////////////////
            $customersQuery = User::where('role_id', 3);

            $currentPrice = $request->query('price', '');
            if($currentPrice === ""){
                $customers = $customersQuery->select('users.*')
                ->addSelect(DB::raw('COALESCE((SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id), 0) as total_amount'))
                ->get();  
            }else{
                $arrPrice = explode('-', $currentPrice);
                if(count($arrPrice) === 1){
                    $customers = $customersQuery->select('users.*')
                    ->addSelect(DB::raw('COALESCE((SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id), 0) as total_amount'))
                    ->whereRaw('(SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id) >= ?', [$arrPrice[0]])
                    ->get();
                }else if(count($arrPrice) === 2){
                    $customers = $customersQuery->select('users.*')
                    ->addSelect(DB::raw('COALESCE((SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id), 0) as total_amount'))
                    ->whereRaw('(SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id) >= ?', [$arrPrice[0]])
                    ->whereRaw('(SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id) <= ?', [$arrPrice[1]])
                    ->get();
                }else{
                    $customers = $customersQuery->select('users.*')
                    ->addSelect(DB::raw('COALESCE((SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id), 0) as total_amount'))
                    ->get();  
                }
            }
           
            ////////////////////////////////
            $currentStatus = $request->query('status', '');
            if ($currentStatus) {
                $customersQuery->where('status', $currentStatus);
            }
            
            ////////////////////////////////
            $currentTotalItem = $request->query('total_item', 5);
            if ($currentTotalItem === 'all') {
                $currentTotalItem = null;
            }      
            if ($currentTotalItem) {
                $customers = $customersQuery->paginate($currentTotalItem);
            } else {
                $customers = $customersQuery->paginate();
            }
        
            $allCustomer = DB::table('users')
                    ->select('users.name as Họ tên', 'users.email as Email', 'users.phone_number as Số điện thoại')
                    ->addSelect(DB::raw('COALESCE((SELECT SUM(price * quantity) FROM order_details INNER JOIN orders ON orders.id = order_details.order_id WHERE orders.customer_id = users.id), 0) as `Tổng tiền đã mua`'))
                    ->get();
        
        


            return view('Admin.Customer.listCustomer')
                ->with('customers', $customers)
                ->with('totalItemOptions', $totalItemOptions)
                ->with('currentTotalItem', $currentTotalItem)
                ->with('statusOptions', $statusOptions)
                ->with('currentStatus', $currentStatus)
                ->with('priceOptions', $priceOptions)
                ->with('currentPrice', $currentPrice)
                ->with('allCustomer', $allCustomer);
        }else{
            return redirect()->route('QLBanGiay.login');
        }
    }
    

    public function changeStatus(Request $request, $id) {
        $user = Session::get('user');
        
        if ($user) {
            $customer = User::find($id);
    
            if ($customer) {
                $action = $request->query('action');
    
                if ($action == 'khoa') {
                    $customer->status = 'khoa';
                    $message = 'Đã khóa tài khoản của: ' . $customer->name;
                } elseif ($action == 'mo_khoa') {
                    $customer->status = 'hoat dong';
                    $message = 'Đã mở khóa tài khoản của: ' . $customer->name;
                }
    
                $customer->save();
    
                return redirect()->route('QLBanGiay.listCustomer')
                    ->with('message', $message)
                    ->with('type', 'success');
            }
            
            return redirect()->route('QLBanGiay.listCustomer')
                ->with('message', 'Tài khoản này không tồn tại')
                ->with('type', 'error');
        }
        
        return redirect()->route('QLBanGiay.login');
    }    

    public function exportCustomers()
    {
        $customers = User::where('role_id', 3);
        dd($customers);
        return response()->json($customers);
    }

    
}