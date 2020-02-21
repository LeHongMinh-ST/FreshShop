<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Oder;
use App\Warehouse;
use Illuminate\Http\Request;

class OderController extends Controller
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
        $oders = Oder::withTrashed()->sortable()->orderBy('status')->paginate(10);
        return view('backend.oder.list')->with('oders',$oders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oder = Oder::withTrashed()->find($id);
        $product_oder = $oder->Products;
        $oder->subtotal = 0;
        foreach ($product_oder as $product)
        {
            $oder->subtotal+=$product->pivot->unit_price*$product->pivot->quantity;
        }
        return view('backend.oder.show')->with(['oder'=>$oder,'product_oder'=>$product_oder]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oder = Oder::find($id);
        $oder->delete();
        return redirect()->back();
    }

    public function ship($id)
    {
//        dd(1);
        $oder = Oder::find($id);
        $oder->status = 2;
        $oder->save();
        return redirect()->back();
    }

    public function success($id)
    {
        //Cập nhật trạng thái sản phẩm
        $oder = Oder::find($id);
        $oder->status = 1;
        $oder->save();

        //Cập nhật kho hàng
        $products = $oder->Products;
        foreach ($products as $product)
        {
//            dd($product->pivot->quantity);
            $warehouse = Warehouse::where('product_id',$product->id)->first();
            $warehouse->sell += $product->pivot->quantity;
            $warehouse->save();
        }


        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $oder = Oder::withTrashed()->find($id);
        $this->authorize('forceDelete',$oder);
        $oder->products()->detach();
        $oder->forceDelete();
        return redirect()->route('Oder.index');
    }


}
