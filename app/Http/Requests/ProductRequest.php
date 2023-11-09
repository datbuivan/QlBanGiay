<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required| min:6',
            'import_price'=>'required |numeric',
            'export_price'=>'required |numeric',
            'discount'=>'required|numeric|nullable',
            'avatar'=>'mimes:jpeg,png,jpg,gif|image',
            'object_id'=>'string |nullable',
            'product_status'=>'boolean |nullable',
            'hot_status'=>'boolean |nullable',
            'best_seller_status'=> 'boolean |nullable',
            'color_id'=>'required |integer',
            'type_product_id'=>'required |integer',
            //'design_id'=>'required |integer',
            'gender_id'=>'required |integer',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'import_price.required' => 'Giá nhập không được để trống',
            'import_price.numeric'=>'Giá nhập phải là kiểu số',
            'export_price.required' => 'Giá bán không được để trống',
            'export_price.numeric'=>'Giá bán phải là kiểu số',
            'discount.numeric'=>'Giảm giá phải là kiểu số vd: 0.2 ...',
            // 'avatar.required'=>'Vui lòng chọn ảnh sản phẩm',
            'avatar.mimes'=>"Ảnh phải có định dang :mimes ",
            //'avatar.size'=>"Ảnh phải không được vượt quá 10MB ",
            'color_id.required'=>"Vui lòng chọn màu sản phẩm",
            'type_product_id.required'=>"Vui lòng chọn loại sản phẩm",
            //'design_id.required'=>"Vui lòng chọn kiểu sản phẩm",
            'gender_id.required'=>"Vui lòng chọn giới tính cho sản phẩm",
        ];
    }
}