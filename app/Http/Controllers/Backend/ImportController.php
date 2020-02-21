<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Import;
use App\Product;
use App\Supplier;
use App\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $imports = Import::withTrashed()->sortable()->orderBy('status')->paginate(10);
        return view('backend.import.list')->with(['imports' => $imports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Cart::instance('import')->content();
        $suppliers = Supplier::all();
        return view('backend.import.create')->with(['items' => $items, 'suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $qty = $request->get('qty');
        $product = Product::find($request->get('id'));
//        Cart::instance('import')->destroy();
        $save = Cart::instance('import')->add($product->id, $product->name, $qty, $product->price_import, 0, []);
        $warehouse = Warehouse::where('product_id', $product->id)->first();
        $warehouse->status = 2;
        $warehouse->save();
        if ($save) return 1;
        return 0;
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $import = Import::withTrashed()->find($id);
        $product_import = $import->Products;
        $import->subtotal = 0;
        foreach ($product_import as $product) {
            $import->subtotal += $product->pivot->price * $product->pivot->quantity;
        }
        return view('backend.import.show')->with(['import' => $import, 'product_import' => $product_import]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $success = Cart::instance('import')->update($id, $request->get('qty'));
        if ($success)  session()->flash('success', 'Cập nhật thành công số lượng sản phẩm '.Cart::instance('import')->get($id)->name);
        return redirect()->back();
    }

    public function deleteItem($id)
    {
        $item = Cart::instance('import')->get($id);
        $warehoue = Warehouse::where('product_id',$item->id)->first();
        $warehoue->status = 0;
        $warehoue->save();
        $success = Cart::instance('import')->remove($id);
        if ($success)  session()->flash('success', 'Xóa thành công sản phẩm '.Cart::instance('import')->get($id)->name);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $import = Import::find($id);
        $success = $import->delete();
        if ($success)
            session()->flash('success', 'Hủy thành công đơn nhập');
        else
            session()->flash('error', 'Hủy thất bại');
        return redirect()->route('Import.index');
    }

    public function success($id)
    {
        $import = Import::find($id);
        $import->status = 1;
        $import->date_import = date('Y-m-d');
        $products = $import->Products;
        foreach ($products as $product) {
            $warehouse = Warehouse::where('product_id', $product->id)->first();
            $warehouse->status = 0;
            $warehouse->import += $product->pivot->quantity;
            $warehouse->save();
        }

        $success = $import->save();
        if ($success)
            session()->flash('success', 'Hoàn thành đơn hàng');
        else
            session()->flash('error', 'Hoàn thành thất bại');

        return redirect()->back();
    }

    public function deleteCart()
    {
        $products = Cart::instance('import')->content();
//        dd($products);
        foreach ($products as $product) {
            $warehouse = Warehouse::where('product_id', $product->id)->first();
            $warehouse->status = 0;
            $warehouse->save();
        }
        $success = Cart::instance('import')->destroy();

        if ($success)
            session()->flash('success', 'Xóa thành công giỏi hàng');

        return redirect()->route('Import.create');
    }

    public function send(Request $request)
    {
        $import = new Import();
//        dd($request->get('supplier'));
        $items = Cart::instance('import')->content();
        $import->supplier_id = $request->get('supplier');
        $import->payment = str_replace(',','',Cart::instance('import')->total());
        $import->status = 0;
        $import->note = $request->get('note');

        $sucsess = $import->save();

        foreach ($items as $item) {
            $import->products()->attach($item->id, [
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);

            $warehoue = Warehouse::where('product_id', $item->id)->first();
            $warehoue->status = 1;
            $warehoue->save();
        }

        if ($sucsess) {
            session()->flash('success', 'Gửi thành công');
            Cart::instance('import')->destroy();
            return redirect()->route('Import.index');
        }
    }

    public function hardDelete($id)
    {
        $import = Import::withTrashed()->find($id);
        $this->authorize('forceDelete', $import);
//        dd($import);
        $import->products()->detach();
        $success = $import->forceDelete();
        if ($success) session()->flash('success', 'Xóa thành công');
        return redirect()->route('Import.index');
    }

}
