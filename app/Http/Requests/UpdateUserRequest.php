<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|min:5|max:255|',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'image'=>'image|max:512'
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
            'email'=>':attribute không đúng cấu trúc email',
            'image'=>':attribute không phải là ảnh'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên nhân viên',
            'email'=>'Email',
            'password'=>'Mật Khẩu',
            'phone'=>'Số điện thoại',
            'role'=>'Chức vụ',
            'image'=>'ảnh'
        ];
    }
}
