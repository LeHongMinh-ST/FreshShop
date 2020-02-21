<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Warehouse;
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
        $warehouse = Warehouse::where('product_id',$product->id)->first();
        if (isset($sale) && $sale->status == 1) $product->sale = $sale->price_sale;
        $product->remain = $warehouse->remain;
        die(json_encode($product));
    }
}
