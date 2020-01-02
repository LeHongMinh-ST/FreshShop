<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Oder;
use Illuminate\Http\Request;

class OderController extends Controller
{
    public function showProduct($id)
    {
        $oder = Oder::find($id);
        $products = $oder->Products;
        return view('backend.oder.showProduct')->with(['products'=>$products]);
    }
}
