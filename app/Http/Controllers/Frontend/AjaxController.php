<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Sale;

class AjaxController extends Controller
{
    //
    public function singleProduct($id)
    {
        $product = Product::find($id);
        $sale = $product->Sale;
        if (isset($sale) && $sale->status == 1) $product->sale = $sale->price_sale;
        die(json_encode($product));
    }
}
