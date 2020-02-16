<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('shoping')->content();
        return view('frontend.page.cart')->with([
            'items' => $items,
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');
        $qty = $request->get('qty');
        $product = Product::find($id);
        $sale = $product->Sale;
        if (isset($sale) && $sale->status == 1) {
            $product->price_sell = $sale->price_sale;
        }
        $save = Cart::instance('shoping')->add($product->id, $product->name, $qty, $product->price_sell, 0, ['avatar' => $product->avatar]);
        $total = Cart::instance('shoping')->count();
        if ($save) return $total;
        else return 0;
    }

    public function update()
    {

    }

    public function delete($rowId)
    {
        Cart::instance('shoping')->remove($rowId);
        return back();
    }

    public function destroy()
    {
        Cart::instance('shoping')->destroy();
        return back();
    }

    public function checkout()
    {
        return view('frontend.page.checkout');
    }
}
