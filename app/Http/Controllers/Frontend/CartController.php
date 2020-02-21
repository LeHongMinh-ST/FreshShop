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
        $items = Cart::instance('shopping')->content();
        return view('frontend.page.cart')->with([
            'items' => $items,
        ]);
    }

    public function store(Request $request,$id)
    {
        $qty = $request->get('qty_product');
        $product = Product::find($id);
        $sale = $product->Sale;
        if (isset($sale) && $sale->status == 1) {
            $product->price_sell = $sale->price_sale;
        }
        $save = Cart::instance('shopping')->add($id, $product->name, $qty, $product->price_sell, 0, ['avatar' => $product->avatar]);

        if ($save)
            $request->session()->flash('success', 'Thêm thành công sản phẩm '.$product->name .' vào giỏ hàng');
        return redirect()->back();
    }

    public function storeAjax(Request $request)
    {
        $id = $request->get('id');
        $qty = $request->get('qty');
        $product = Product::find($id);
        $sale = $product->Sale;
        if (isset($sale) && $sale->status == 1) {
            $product->price_sell = $sale->price_sale;
        }
        $save = Cart::instance('shopping')->add($product->id, $product->name, $qty, $product->price_sell, 0, ['avatar' => $product->avatar]);
        $total = Cart::instance('shopping')->content()->count();
        if ($save) return $total;
        else return 0;
    }

    public function update(Request $request,$id)
    {
        $success = Cart::instance('shopping')->update($id,$request->get('qty'));
        if ($success)  session()->flash('success', 'Cập nhật thành công số lượng sản phẩm '.Cart::instance('shopping')->get($id)->name);

        return redirect()->back();
    }

    public function delete($rowId)
    {
        $name = Cart::instance('shopping')->get($rowId)->name;
        $success =  Cart::instance('shopping')->remove($rowId);
        if ($success) session()->flash('success', 'Cập nhật thành công số lượng sản phẩm '.$name);

        return redirect()->route('cart.index');
    }

    public function destroy()
    {
        $success = Cart::instance('shopping')->destroy();
        if ($success) session()->flash('success', 'Cập nhật thành công số lượng sản phẩm '.$name);
        return back();
    }

    public function checkout()
    {
        return view('frontend.page.checkout');
    }
}
