<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255|unique:products,name',
            'price_import' => 'required|numeric|min:0',
            'price_sell' => 'required|numeric|min:0',
            'content' => 'required',
            'avatar' => 'required|image|max:512',
            'images.*' => 'image|max:512',
            'unit' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống !',
            'min' => ':attribute phải lớn hơn :min !',
            'max' => ':attribute phải nhỏ hơn :max !',
            'unique'=> ':attribute đã tồn tại!',
            'numeric' => ':attribute phải là số!',
            'mimes'=>':attribute không đúng định dạng!',
            'image'=>'không phải ảnh!'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'price_import' =>'Giá nhập',
            'price_sell' => 'Giá bán',
            'content' => 'Nội dung',
            'avatar' => 'Ảnh đại diện',
            'images' => 'Ảnh mô tả',
            'unit' => 'Đơn vị',
            'status' => 'Trạng thái'
        ];
    }
}
