<?php

namespace App\Http\Controllers;

use App\User;
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

        $array = ['1','2','3'];

//        $user  = User::get();
//        $cache =  Cache::put('menus',$user);
//        $view_number = Cache::increment('view',3);
//        $view_number = Cache::decrement('view',1);
//        $number = Cache::get('view');
//        dd($number);

//        $value = Cache::remember('users',120,function (){
//           return User::get();
//        });
        $value = Cache::put('value',$array);
//        dd($value);

//        session([
//            'key' => 'value',
//            'name'=>'minh'
//        ]);
//        session()->put('age',16);
//        if (session()->has('age')) echo 'co';
//        else echo 'khong';
//        $user = Auth::user();
//        dd(1);
        return view('home');
    }
    public function get()
    {
//        $users = Cache::get('users');
//        if(Cache::has('menus'))
//        {
//            $value = Cache::pull('value');
//        }else dd(1);
        Cache::forget('value');
        $value = Cache::get('value');
        dd($value);
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
