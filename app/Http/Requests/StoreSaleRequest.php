<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            'id'=>'unique:sales,product_id',
            'price_sale'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'unique'=>'Sản phẩm đã có sale',
            'required'=>':attribute không được để trống'
        ];
    }

    public function attributes()
    {
        return [
            'price_sale'=>'Giá khuyến mãi',
        ];
    }
}
