<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Import;
use App\Product;
use App\Supplier;
use App\Warehouse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imports = Import::withTrashed()->paginate(10);
        return view('backend.import.list')->with(['imports'=>$imports]);
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
        //
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
        $import->delete();
        return redirect()->route('Import.index');
    }

    public function success($id)
    {
        $import = Import::find($id);
        $import->status = 1;
        $import->date_import = date('Y-m-d');
        $import->save();
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
        Cart::instance('import')->destroy();
        return redirect()->route('Import.create');
    }

    public function send(Request $request)
    {
        $import = new Import();
//        dd($request->get('supplier'));
        $items = Cart::instance('import')->content();
        $import->supplier_id = $request->get('supplier');
        $import->status = 0;
        $import->note = $request->get('note');

        $sucsess = $import->save();

        foreach ($items as $item)
        {
            $import->products()->attach($item->id,[
                'quantity'=>$item->qty,
                'price'=>$item->price,
            ]);
        }

        if($sucsess){
            Cart::instance('import')->destroy();
            return redirect()->route('Import.index');
        }
    }

    public function hardDelete($id)
    {
        $import = Import::withTrashed()->find($id);

        $import->forceDelete();
        return redirect()->back();
    }

}
