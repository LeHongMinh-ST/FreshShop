<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        return view('backend.category.list')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('depth', '<=', 2)->get();
        return view('backend.category.create')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/category/', $image, $profileimage);
            $category->image = $profileimage;
        }
        $save = $category->save();

        if ($save)
            $request->session()->flash('success', 'Tao mới thành công');
        else
            $request->session()->flash('error', 'Tạo mới thất bại');

        return redirect()->route('Category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $category_data = Category::where('id', $id)->get();
//        dd($category_data);
        $category->parent = Category::find($category->parent_id);
        $category_data = $this->getCategories($category_data);
        $category_id = $this->getCategoryId($category_data);
        $products = Product::whereIn('category_id', $category_id)->get();
        $category->child = Category::whereIn('parent_id', $category_id)->get();
        return view('backend.category.show')->with(['category' => $category, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $category = Category::find($id);
        return view('backend.category.update')->with(['categories' => $categories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $parentCategory = Category::find($request->get('category_id'));
        $category = Category::find($id);
        $this->authorize('update', $category);
        $category->name = $request->get('name');
        $category->slug = Str::slug($category->name);
        if (isset($parentCategory))
            $category->depth = $parentCategory->depth + 1;
        else $category->depth = 1;
        $category->content = $request->get('content');
        $category->parent_id = $request->get('category_id');
        $category->user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/category/', $image, $profileimage);
            $category->image = $profileimage;
        }
        $save = $category->save();

        if ($save)
            $request->session()->flash('success-update', 'Cập nhật thành công');
        else
            $request->session()->flash('error-update', 'Cập nhật thất bại');

        return redirect()->route('Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $this->authorize('update', $category);

        //Xóa thư mục
        $category->delete();

        return redirect()->route('Category.index');
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->paginate(10);
        return view('backend.category.trashed')->with(['categories' => $categories]);
    }

    public function hardDelete($id)
    {
        $category = Category::withTrashed()->find($id);
        //Xóa file avatar trong thư mục
        if ($category->image) {
            $img = 'storage/images/category/' . $category->image;
            File::delete($img);
        }
        $category->forceDelete();
        return redirect()->route('Category.trashed');
    }

    public function showProduct($id)
    {
        $category = Category::find($id);
        $products = $category->Products;
        return view('backend.categories.showProduct')->with(['products' => $products]);
    }

    private function getCategoryId($parent_categories)
    {
        foreach ($parent_categories as $category) {
            $category_id[] = $category->id;
            if ($category->has_child) {
                $category_id = array_merge($category_id, $this->getCategoryId($category->sub_category));
            }
        }
        return array_unique($category_id);
    }

    //Lấy các danh mục con
    private function getCategories($parent_categories)
    {
        foreach ($parent_categories as $category) {
            $count = Category::where('parent_id', $category->id)->count();
            if ($count != 0) {
                $category->has_child = true;
                $sub = Category::where('parent_id', $category->id)->get();
                $this->getCategories($sub);
                $category->sub_category = $sub;
            } else {
                $category->sub_category = false;
            }
        }
        return $parent_categories;
    }
}
