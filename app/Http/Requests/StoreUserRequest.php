<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        if ($this->method()=='POST') return [
            'name' => 'required|min:5|max:255|',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:255',
            'phone'=>'required|numeric',
            'role'=>'required|numeric'
        ];
        else return [
            'name' => 'required|min:5|max:255|',
            'email'=>'required|email',
            'password'=>'required|min:8|max:255',
            'phone'=>'required|numeric',
            'role'=>'required|numeric'
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
            'mimes'=>':attribute không đúng định dạng',
            'email'=>':attribute không đúng cấu trúc email'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên nhân viên',
            'email'=>'Email',
            'password'=>'Mật Khẩu',
            'phone'=>'Số điện thoại',
            'role'=>'Chức vụ'
        ];
    }
}
