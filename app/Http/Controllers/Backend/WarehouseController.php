<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $warehouses = Warehouse::all();
        foreach ($warehouses as $warehouse) {
            $product = Product::withTrashed()->find($warehouse->product_id);
            $import = $product->Imports->first();
            if (isset($import)) {
                if ($import->status == 0 )
                    $warehouse->status = 1;
            } else $warehouse->status = 0;
            $warehouse->remain = $warehouse->import - $warehouse->sell;
            $warehouse->save();
        }

    }

    public function index()
    {
//        dd(1);
        $warehouses = Warehouse::sortable()->paginate(10);
        foreach ($warehouses as $warehouse) {
            $product = Product::withTrashed()->find($warehouse->product_id);
            $warehouse->category = $product->Category->name;
            $warehouse->name = $product->name;
            $warehouse->avatar = $product->avatar;
            $warehouse->unit = $product->unit;
        }

        return view('backend.warehouse.list')->with('warehouses', $warehouses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
