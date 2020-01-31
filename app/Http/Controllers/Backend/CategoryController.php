<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
        return view('backend.category.list')->with(['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.category.create')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $parentCategory = Category::find($request->get('category_id'));
        $category = new Category();
        $this->authorize('create', Category::class);

        $category->name = $request->get('name');
        $category->slug = Str::slug($category->name);
        $category->depth = $parentCategory->depth + 1;
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
        $category = Category::find($id);
        $category_data = Category::where('id',$id)->get();
//        dd($category_data);
        $category->parent = Category::find($category->parent_id);
        $category->child = Category::where('parent_id',$category->id)->first();
//        dd($category->id);
        $category_id = $this->getCategoryId($category_data);
        $products = Product::whereIn('category_id',$category_id)->get();

//        dd($category->child);
        return view('backend.category.show')->with(['category'=>$category,'products'=>$products]);
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
        return view('backend.category.update')->with(['categories'=>$categories,'categories'=>$category]);
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
        $this->authorize('update', $category);

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
        $category = Category::find($id);
        $this->authorize('update', $category);

        //Xóa file avatar trong thư mục
        if($category->image)
        {
            $img = 'backend/dist/img/categories/'. $category->image;
            File::delete($img);
        }

        //Xóa thư mục
        $category->delete();

        return  redirect()->route('Category.index');
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

    private function getCategoryId($parent_categories)
    {
        foreach ($parent_categories as $category)
        {
//            dd($categories->sub_category);
            $category_id[] = $category->id;
//            dd($category_id);
            if($category->has_child)
            {
                foreach ($category->sub_category as $value)
                {
                    $category_id[] = $value->id;
                }
                $this->getCategoryId($category->sub_category);
            }
        }
        return $category_id;
    }
}
