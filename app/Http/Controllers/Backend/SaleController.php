<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
    public function index()
    {
        $sales = Sale::where('status',1)->paginate(10);
        foreach ($sales as $sale)
        {
            $product = $sale->Product;
            $sale->name = $product->name;
            $sale->avatar = $product->avatar;
            $sale->unit = $product->unit;
            $sale->category = $product->Category->name;
        }
        return view('backend.sale.list')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::find($id);
        return view('backend.sale.create')->with('product',$product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $sale = new Sale();
        $sale->product_id = $request->get('product_id');
        $sale->price_sale = $request->get('price_sale');
        $sale->start = $request->get('start');
        $sale->end = $request->get('end');
        $sale->note = $request->get('note');
//        dd($sale->end );
        if(strtotime(date('Y-m-d'))-strtotime($sale->end)<0) $sale->status = 1;
        else $sale->status = 0;

        $sale->save();
        return redirect()->route('backend.sale.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
