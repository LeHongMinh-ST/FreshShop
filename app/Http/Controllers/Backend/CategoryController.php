<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.list')->with(['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.categories.create')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = Str::slug('name');
        $category->depth = $request->get('category_id') + 1;
        $category->content = $request->get('content');
        $category->parent_id = $request->get('category_id');
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->route('Category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $category = Category::find($id);
        return view('backend.categories.update')->with(['categories'=>$categories,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->slug = Str::slug('name');
        $category->depth = $request->get('category_id') + 1;
        $category->content = $request->get('content');
        $category->parent_id = $request->get('category_id');
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->route('Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function test()
    {
        $categories = Category::find(3);
        $products = $categories->Products;
        foreach ($products as $product)
        {
            echo $product->name .'<br>';
        }
    }

    public function showProduct($id)
    {
        $category = Category::find($id);
        $products  = $category->Products;
        return view('backend.categories.showProduct')->with(['products'=>$products]);
    }
}
