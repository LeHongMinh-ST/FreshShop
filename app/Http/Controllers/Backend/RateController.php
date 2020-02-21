<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
//        dd($request->all());
        $customer = Customer::select(['id'])->where('user_id',Auth::user()->id)->first();
        $product = Product::select(['slug'])->find($id);
//        dd($customer);
//        dd();
        $rate = new Rate();
        $rate->product_id = $id;
        $rate->customer_id = $customer->id;
        $rate->comment = $request->get('comment');
        $rate->rate = $request->get('rate');

        $sucsess = $rate->save();
        if ($sucsess) session()->flash('rate-success','Đánh giá thành công');

        return redirect()->route('frontend.detail',$product->slug);
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
