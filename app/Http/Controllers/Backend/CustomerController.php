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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::sortable()->paginate(10);
        return view('backend.customer.list')->with(['customers' => $customers]);
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
        $customer = Customer::find($id);
        $user = User::find($customer->user_id);
        $customer->delete();
        $success = $user->delete();
        if ($success)
            session()->flash('success', 'Xóa thành công khách hàng ' . $customer->name);
        else
            session()->flash('error', 'Xóa thất bại');

        return redirect()->route('Customer.index');
    }

    public function trashed()
    {
        $customers = Customer::onlyTrashed()->paginate(6);
        return view('backend.customer.trashed')->with(['customers' => $customers]);
    }

    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        $user = User::onlyTrashed()->find($customer->user_id);
        $user->restore();
        $success = $customer->restore();

        if ($success)
            session()->flash('success', 'khôi phục thành công khách hàng ' . $customer->name);
        else
            session()->flash('error', 'khôi phục thất bại');

        return redirect()->route('Customer.index');
    }

    public function hardDelete($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        $user = User::onlyTrashed()->find($customer->user_id);
        $name = $customer->name;
        $customer->forceDelete();
        $success = $user->forceDelete();

        if ($success)
            session()->flash('success', 'Xóa thành công khách hàng ' . $name);
        else
            session()->flash('error', 'Xóa thất bại');

        return redirect()->route('Customer.trashed');
    }
}
