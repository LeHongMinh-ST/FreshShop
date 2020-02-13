<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|min:5|max:255|unique:categories,name',
            'content' => 'required',
            'image' => 'image|max:512'
        ];
        else return [
            'name' => 'required|min:5|max:255|',
            'content' => 'required',
            'image' => 'image|max:512'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải lớn hơn :min ',
            'max' => ':attribute phải nhỏ hơn :max ',
            'unique' => ':attribute đã tồn tại',
            'mimes' => ':attribute không đúng định dạng',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'content' => 'Nội dung',
            'images' => 'Ảnh mô tả',
        ];
    }
}
