<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Exceptions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
use App\Models\User;
use \App\Http\Middleware\ValidatedLogin;

Session::start();

class LoginController extends Controller
{

    public function Index()
    {
        return view('Login.Index');
    }

    public function ForgetLogin()
    {
        return view('Login.ForgetLogin');
    }

    public function ResetPasswordLog(Request $request)
    {
        $id_user = $request->query('id');

        $lst = DB::table('users')->select('name', 'password', 'id')
            ->where('id', $id_user)
            ->first();

        if ($lst != null) {
            $UserName = $lst->name;

            return view('Login.ResetPasswordLog', [
                'id' => $id_user,
                'name' => $UserName,
            ]);
        }else{
            return Redirect::to('QLBanGiay/login/dang-nhap-he-thong')->send();
        }
    }

    public function ResetPasswordDB(Request $request)
    {
        try {

            $request->validate([
                'Password' => 'required',
            ]);

            $IdUsers = $request->IdUsers;
            $Password = $request->Password;
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

            DB::table('users')->where('id', $IdUsers)->update([
                'password' => $hashedPassword,
            ]);
            
            return Redirect::to('QLBanGiay/login/dang-nhap-he-thong');
        
        } catch (\Exception $ex) {
            Session::put('message', $ex->getMessage());
            return Redirect::to('QLBanGiay/admin/dat-lai-mat-khau?id_user=1');
        }
    }

    public function SignIn(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'UserName' => 'required',
                'Password' => 'required',
            ]);

            $hashedPassword = $validatedData['Password'];
            $lst = DB::table('users')->select('id' ,'name', 'password','email','role_id','status')
                ->where('email', $validatedData['UserName'])
                ->first();
                
            if ($lst != null ) {
                if( $lst->status === 'hoat dong'){
                    Session::put(['user' => $lst]);
                    if ( password_verify($hashedPassword, $lst->password)) {
                        if($lst->role_id === 3 ){
                            return Redirect::to('/QLBanGiay/home');
                        }else{
                            return Redirect::to('/QLBanGiay/admin/statisticAll');
                        }
                        
                    }else{
                        return redirect()->route('QLBanGiay.login')->with('error', 'Mật khẩu không chính xác');
                    }
                }else{
                    return redirect()->route('QLBanGiay.login')->with('error', 'Tài khoản của bạn đã bị khóa');
                }
            } else {
                return redirect()->route('QLBanGiay.login')->with('error', 'Tài khoản không chính xác');
            }
        } catch (\Exception $ex) {
            Session::put('message', $ex->getMessage());
            return Redirect::to('/QLBanGiay/login/dang-nhap-he-thong');
        }
    }


    public function Logout(Request $request)
    {
        try {
            // Xóa các all session 
            Session::flush();
            return redirect()->route('QLBanGiay.login');
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ]);
        }
    }

    public function ResetPassword(Request $request)
    {
        try {
            $email = $request->email;
            $token = Str::random(60);

            $lst = DB::table('users')
            ->select('name', 'password', 'id')
                ->where('email', $email)
                ->first();
            if ($lst != null) {
                $IdUsers = $lst->id;

                $data = [
                    'id' => $IdUsers,
                ];

                $recipientEmail =  $email;
                $recipientName = 'Khôi phục mật khẩu';

                Mail::Send('Login.EmailFoget', $data, function ($message) use ($recipientEmail, $recipientName) {
                    $message->from('phamquangduc110@gmail.com', 'Website bán giày');
                    $message->to($recipientEmail, $recipientName)
                         ->subject('Khôi phục tài khoản đăng nhập!');
                });
                return  'Đã gửi yêu cầu đến gmail của bạn! Vui lòng kiểm tra gmail';
            } else {
                Session::put('message', 'Email không tồn tại');
                return Redirect::to('/QLBanGiay/login/khoi-phuc-mat-khau');
            }
        } catch (\Exception $ex) {
            // Log hoặc trả về thông báo lỗi
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage(),
            ]);
        }
    }
    public function createUser(){
        return view('pages.DangKy');
    }
}