<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $sales = Sale::all();
        foreach ($sales as $sale) {
            if (strtotime(date('Y-m-d')) >= strtotime($sale->start) && strtotime(date('Y-m-d')) <= strtotime($sale->end)) $sale->status = 1;
            else $sale->status = 0;
            $sale->save();
        }
    }

    public function index()
    {
        $sales = Sale::paginate(10);
        foreach ($sales as $sale) {
            $product = $sale->Product;
            $sale->name = $product->name;
            $sale->avatar = $product->avatar;
            $sale->price_old = $product->price_sell;
            $sale->category = $product->Category->name;
        }
        return view('backend.sale.list')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->authorize('create', Sale::class);
        $product = Product::find($id);
        return view('backend.sale.create')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $this->authorize('create', Sale::class);
        $product_id = $request->get('product_id');
        $product = Product::find($product_id);
        if($product->Sale)
        {
            session()->flash('error', 'Tạo mới thất bại! Đã tồn tại sale');
            return redirect()->route('Warehouse.index');
        }else{
            $sale = new Sale();
            $sale->product_id = $product_id;
            $sale->price_sale = $request->get('price_sale');
            $sale->start = $request->get('start');
            $sale->end = $request->get('end');
            $sale->note = $request->get('note');

//        dd($sale->end );
            if (strtotime(date('Y-m-d')) - strtotime($sale->end) < 0) $sale->status = 1;
            else $sale->status = 0;

            $success = $sale->save();

            if ($success) {
                session()->flash('success', 'Tạo mới thành công');
            }
            return redirect()->route('Sale.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        $this->authorize('update', $sale);
        $product = $sale->Product;
//        dd(date("Y-m-d",strtotime($sale->start)));
        return view('backend.sale.update')->with(['sale' => $sale, 'product' => $product]);
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
        $sale = Sale::find($id);
        $this->authorize('update', $sale);
        $sale->price_sale = $request->get('price_sale');
        $sale->start = $request->get('start');
        $sale->end = $request->get('end');
        $sale->note = $request->get('note');
        if (strtotime(date('Y-m-d')) - strtotime($sale->end) < 0) $sale->status = 1;
        else $sale->status = 0;

        $success = $sale->save();
        if ($success)
            session()->flash('success', 'Cập nhật thành công');
        else
            session()->flash('error', 'Cập nhật thất bại');

        return redirect()->route('Sale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $this->authorize('delete', $sale);
        $success = $sale->delete();
        if ($success)
            session()->flash('success', 'Gỡ thành công');
        else
            session()->flash('error', 'Gỡ thất bại');

        return redirect()->route('Sale.index');

    }
}
