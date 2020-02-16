<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('backend.customer.list')->with(['customers'=>$customers]);
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
    public function store(Request $request)
    {
        //
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
        $customer = Customer::find($id);
        $user = User::find($customer->user_id);
        $customer->delete();
        $user->delete();

        return redirect()->route('Customer.index');
    }

    public function trashed()
    {
        $customers = Customer::onlyTrashed()->paginate(6);
        return view('backend.customer.trashed')->with(['customers'=>$customers]);
    }
    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        $user = User::onlyTrashed()->find($customer->user_id);
        $user->restore();
        $customer->restore();

        return redirect()->route('Customer.index');
    }

    public function hardDelete($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        $user = User::onlyTrashed()->find($customer->user_id);
        $customer->forceDelete();
        $user->forceDelete();

        return redirect()->route('Customer.trashed');
    }
}
