<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'phone' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên không được để trống ', 
            'email.required' => 'Email không được để trống ', 
            'email.email' => 'Phải có định dạng email', 
            'password.required' => 'Mật khẩu không được để trống ', 
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'password.confirmed'=>'Mật khẩu không trùng khớp',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu', 
            'password_confirmation.min' => 'Mật khẩu phải có ít nhất 6 kí tự', 
            'phone.required' => 'Tên không được để trống ', 
        ];
    }
}