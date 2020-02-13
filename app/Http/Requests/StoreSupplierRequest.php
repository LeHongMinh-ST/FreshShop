<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
        if ($this->method()=='POST')   return [
            'name' => 'required|min:5|max:255|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|numeric',
            'address'=>'required',
        ];
        else return [
            'name' => 'required|min:5|max:255|',
            'email'=>'required|email|',
            'phone'=>'required|numeric',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min ',
            'max' => ':attribute phải nhỏ hơn :max ',
            'unique'=> ':attribute đã tồn tại',
            'numeric' => ':attribute phải là số',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên nhà cung cấp',
            'email'=>'Email',
            'phone'=>'Số điện thoại',
            'address'=>'Địa chỉ',
        ];
    }
}
