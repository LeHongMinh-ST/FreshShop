<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Oder;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        foreach ($products as $product) {
            $category = $product->Category;
            $product->category = $category->name;
        }

        return view('backend.product.list')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.product.create')->with(["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest  $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->price_import = $request->get('price_import');
        $product->price_sell = $request->get('price_sell');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->unit = $request->get('unit');
        $product->avatar = 'test';
        $product->save();

        return redirect()->route('Product.index');
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
        $product = Product::find($id);
        $categories = Category::get();
        return view('backend.product.update')->with(['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->slug = Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->price_import = $request->get('price_import');
        $product->price_sell = $request->get('price_sell');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->unit = $request->get('unit');
        $product->avatar = 'test';
        $product->save();

        return redirect()->route('Product.index');
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

    public function test()
    {
//        $product = Product::find(1);
//        $oder = $product->Oder;
//        dd($oder);

        $oder = Oder::find(1);
        $products = $oder->Products;
        dd($products);
    }

    public function showImage($id)
    {
        $product = Product::find($id);
        $images = $product->Images;
//        dd($images);
        return view('backend.image.image')->with(['images' => $images]);
    }
}
