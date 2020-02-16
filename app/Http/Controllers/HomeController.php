<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        dd(Cart::get('baf6a9cf9f20e89137fc06a806d5d9d2'));
        $a = Cart::content();
        dd($a);
        return view('home');
    }
    public function get($id)
    {
        $product = Product::find($id);
        $id = Cart::add($product->id,$product->name, 2, $product->price_sell,0);
//        dd($id);
    }


    public function setCookie()
    {
        Cookie::queue('user_id',1,2);
        Cookie::queue('email','minhST@gmaile.com',2);

        return 1;
//        $cookie = cookie('minh2','minh',2);
//        return response('hello')->cookie($cookie);
    }

    public function getCookie()
    {
        dd(Cookie::get('email'));
    }
}
