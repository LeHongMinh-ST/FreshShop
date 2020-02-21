<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Import;
use App\Oder;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('view-dashboard')) {
            $order = Oder::all();
            $product = Product::withTrashed()->get();
            $customer = Customer::all();
            $post = Post::all();

            return view('backend.dashboard')->with([
                'oders' => $order,
                'products' => $product,
                'customer' => $customer,
                'post' => $post
            ]);
        } else return redirect()->intended('Home');
    }

    public function admin()
    {
        return redirect()->route('backend.dashboard');
    }


}
