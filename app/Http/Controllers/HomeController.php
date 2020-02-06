<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        session([
            'key' => 'value',
            'name'=>'minh'
        ]);
        session()->put('age',16);
//        if (session()->has('age')) echo 'co';
//        else echo 'khong';
//        $user = Auth::user();
//        dd(1);
        return view('home');
    }
    public function get()
    {
        session()->forget('name');
        dd(session()->all());
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
