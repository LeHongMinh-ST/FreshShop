<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('backend.supplier.list')->with(['suppliers'=>$suppliers]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        $supplier = new Supplier();
        $supplier->name = $request->get('name');
        $supplier->email = $request->get('email');
        $supplier->phone = $request->get('phone');
        $supplier->address = $request->get('address');
        $supplier->note = $request->get('note');
        $supplier->save();
        return redirect()->route('Supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd(1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('backend.supplier.update')->with(['supplier'=>$supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->get('name');
        $supplier->email = $request->get('email');
        $supplier->phone = $request->get('phone');
        $supplier->address = $request->get('address');
        $supplier->note = $request->get('note');
        $supplier->save();
        return redirect()->route('Supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect()->route('Supplier.index');
    }

    public function trashed()
    {
//        $this->authorize('viewAny');
        $suppliers = Supplier::onlyTrashed()->paginate(10);
        return view('backend.supplier.trashed')->with(['suppliers'=>$suppliers]);
    }

    public function restore($id)
    {
        $supplier = Supplier::onlyTrashed()->find($id);
//        $this->authorize('restore', $supplier);
        $supplier->restore();
        return redirect()->route('Supplier.index');
    }

    public function hardDelete($id)
    {
        $supplier = Supplier::onlyTrashed()->find($id);
        $this->authorize('forceDelete', $supplier);

        $supplier->forceDelete();

        return redirect()->route('Supplier.trashed');
    }

}
