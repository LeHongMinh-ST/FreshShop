<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOderRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'email|required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống!',
            'email' => ':attribute phải là email!'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên người nhận',
            'address' => 'Địa chỉ nhận',
            'email' => 'Địa chỉ email',
            'phone' => 'Số điện thoại'
        ];
    }
}
