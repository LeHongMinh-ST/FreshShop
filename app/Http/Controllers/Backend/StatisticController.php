<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Oder;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers_oder = Oder::select('customer_id', DB::raw('count(customer_id) as count'))
            ->where('customer_id', '<>', null)
            ->orderBy('count', 'desc')
            ->groupBy('customer_id')->get(10);
        $products = Product::all();
        foreach ($products as $product) {
            $product->count = 0;
            if ($product->Oders->count() > 0) {
                foreach ($product->oders as $oder) {
                    $product->count += $oder->pivot->quantity;
                }
            }
        }
        $productsDecs = $products->sortByDesc(function ($product) {
            return $product->count;
        })->take(10);
        $productsAsc = $products->sortBy(function ($product) {
            return $product->count;
        })->take(10);

//        dd($productsAsc);
        return view('backend.statistic.index')->with([
            'customers_oder' => $customers_oder,
            'productsDecs' => $productsDecs,
            'productsAsc' => $productsAsc
        ]);
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
        //
    }
}
