<?php

namespace App\Http\Controllers\Frontend;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Oder;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Composer\Autoload\includeFile;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) return redirect()->route('checkout.invoice');
        return view('frontend.page.checkout.method');
    }

    public function invoice()
    {
        $items = Cart::instance('shoping')->content();
        return view('frontend.page.checkout.invoice')->with(['items' => $items]);
    }

    public function method(Request $request)
    {
        if ($request->get('method') == 1) return redirect()->route('register.form');
        else return redirect()->route('checkout.invoice');
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
        $items = Cart::instance('shoping')->content();
        $customer = null;
        $date = date('Y-m-d');
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            $customer = $user->Customer;
        }
        $oder = new Oder();
        if(isset($customer))$oder->customer_id = $customer->id ;
        $oder->name = $request->get('name');
        $oder->email = $request->get('email');
        $oder->phone = $request->get('phone');
        $oder->date_oder = date('Y-m-d',strtotime($date . '1 days'));
        $oder->payment = Cart::instance('shoping')->total();
        $oder->address = $request->get('address');
        $oder->note = $request->get('note');
        $sucsess = $oder->save();


        foreach ($items as $item) {
            $oder->products()->attach($item->id,[
                'quantity'=>$item->qty,
                'unit_price'=>$item->price,
            ]);
        }

        if($sucsess){
            Cart::instance('shoping')->destroy();
            return redirect()->route('frontend.home');
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
