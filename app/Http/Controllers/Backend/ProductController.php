<?php

namespace App\Http\Controllers\Backend;

use App\Depot;
use App\Http\Controllers\Controller;
use App\Image;
use App\Oder;
use App\Sale;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPUnit\Framework\StaticAnalysis\HappyPath\AssertNotInstanceOf\A;
use \Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        //===Cập nhật trạng thái sản phẩm===
        $products = Product::all();
        foreach ($products as $product) {
            $warehouse = $product->Warehouse;
            if ($warehouse['remain'] > 0) {
                $product->status = 1;
            } elseif ($warehouse['remain'] == 0 && $warehouse['status'] == 1)
                $product->status = 2;
            else $product->status = 0;
            $product->save();
        }

        //===Cập nhật sản phẩm khuyến mãi===
        $sales = Sale::all();
        foreach ($sales as $sale)
        {
            if (strtotime(date('Y-m-d'))-strtotime($sale->end)) $sale->status = 1;
            else $sale->status =0;
            $sale->save();
        }
    }

    public function index()
    {
        $products = Product::sortable()->paginate(10);
        foreach ($products as $product) {
            $category = $product->Category;
            $sale = $product->Sale;
            if (isset($sale) && $sale->status == 1) $product->price_sale = $sale->price_sale;
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
        return view('backend.product.create')->with(["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = Str::slug($product->name);
        $product->category_id = $request->get('category_id');
        $product->price_import = $request->get('price_import');
        $product->price_sell = $request->get('price_sell');
        $product->content = $request->get('content');
        $product->user_id = Auth::user()->id;
        $product->unit = $request->get('unit');

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $path_avatar = 'images/product/avatar';
            $profileavatar = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
            Storage::disk('public')->putFileAs($path_avatar, $avatar, $profileavatar);
            $product->avatar = $profileavatar;
//            $resize_avatar = \Intervention\Image\Facades\Image::make('images/product/avatar/'.$profileavatar)->resize(270,280);
//            Storage::disk('public')->putFileAs('images/product/avatar/thumbnail', $resize_avatar, $profileavatar);


        }
        $success = $product->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $path_img = 'images/product/description';

            $i = 0;
            foreach ($images as $image) {
                $profileimage = date('YmdHis') . $i . "." . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs($path_img, $image, $profileimage);
                $image_new = new Image();

                $image_new->name = $profileimage;
                $image_new->path = 'storage/' . $path_img;
                $image_new->product_id = $product->id;

                $image_new->save();
                $i++;
            }
        }

        //Thêm dữ liệu vào bảng kho
        $warehouse = new Warehouse();
        $warehouse->product_id = $product->id;
        $warehouse->save();


        if ($success)
            $request->session()->flash('success', 'Tao mới thành công sản phẩm '.$product->name);
        else
            $request->session()->flash('error', 'Tạo mới thất bại');
        return redirect()->route('Product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $product = Product::find($id);
        $images = $product->Images;
        $category = $product->Category;
        $comments = $product->Comments;
        $sale = $product->Sale;

        //Lấy đánh giá
        $rates = $product->Rates;

        $avg = 0;
        if ($rates->count() > 0) {

            $i = 0;
            foreach ($rates as $rate) {
                $avg += $rate->rate;
                $i++;
            }
            $avg = $avg / $i;
        }

        if (isset($sale) && $sale->status == 1) $product->price_sale = $sale->price_sale;
        $product->category = $category->name;
        return view('backend.product.show')->with([
            'product' => $product,
            'images' => $images,
            'comments'=>$comments,
            'avg' => $avg,
            'rates'=>$rates,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
//        dd($product->Images);
        $user = Auth::user();
        if ($user->can('update', $product)) {
            return view('backend.product.update')->with(['product' => $product, 'categories' => $categories]);
        } else return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(StoreProductRequest $request, $id)
    {

//        dd($request->all());
//        dd($request->file('images'));

        $product = Product::find($id);
        $this->authorize('update', $product);

        $product->name = $request->get('name');
        $product->slug = Str::slug($product->name);
        $product->category_id = $request->get('category_id');
        $product->price_import = $request->get('price_import');
        $product->price_sell = $request->get('price_sell');
        $product->content = $request->get('content');
        $product->user_id = Auth::user()->id;
        $product->unit = $request->get('unit');
        if ($request->hasFile('avatar')) {
//            dd(1);
            if (isset($product->avatar)) {
                $avatar = 'storage/images/product/avatar/' . $product->avatar;
                File::delete($avatar);
            }
            $avatar = $request->file('avatar');
            $path_avatar = 'images/product/avatar';
            $profileavatar = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
            Storage::disk('public')->putFileAs($path_avatar, $avatar, $profileavatar);
            $product->avatar = $profileavatar;
        }

        $success = $product->save();


        if ($request->hasFile('images')) {
            $images = $request->file('images');

            if (isset($product->Images)) {
                foreach ($product->Images as $image)
                {
                    $paths = 'storage/images/product/description/' . $image->name;
                    File::delete($paths);
                    $image->delete();
                }
            }

            $path_img = 'images/product/description';
            $i = 0;

            foreach ($images as $image) {

                $profileimage = date('YmdHis') . $i . "." . $image->getClientOriginalExtension();

                Storage::disk('public')->putFileAs($path_img, $image, $profileimage);

                $image_new = new Image();

                $image_new->name = $profileimage;
                $image_new->path = 'storage/' . $path_img;
                $image_new->product_id = $product->id;

                $image_new->save();
                $i++;
            }
        }


        if ($success)
            $request->session()->flash('success', 'Cập nhật thành công sản phẩm '.$product->name);
        else
            $request->session()->flash('error', 'Cập nhật mới thất bại');

        return redirect()->route('Product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $product = Product::find($id);
        $this->authorize('delete', $product);
        //Xóa file avatar trong thư mục

        //Xóa sản phẩm
        $success = $product->delete();
        if ($success)
            session()->flash('success', 'Gỡ thành công sản phẩm '.$product->name);
        else
            session()->flash('error', 'Gỡ mới thất bại');
        return redirect()->route('Product.index');

    }


    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate(10);

        foreach ($products as $product) {
            $category = $product->Category;
            $product->category = $category->name;
        }
        return view('backend.product.trashed')->with(['products' => $products]);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $this->authorize('restore', $product);
        $success = $product->restore();

        if ($success)
            session()->flash('success', 'Khôi phục thành công sản phẩm '.$product->name);
        else
            session()->flash('error', 'Khôi phục thất bại');

        return redirect()->route('Product.trashed');
    }

    public function restoreAll()
    {
        $products = Product::onlyTrashed()->get();
        foreach ($products as $product)
        {
            $product->restore();
        }
        session()->flash('success', 'Khôi phục thành công toàn bộ sản phẩm');
        return redirect()->route('Product.trashed');
    }

    public function hardDelete($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $wearhouse = Warehouse::where('product_id',$product->id);
        $this->authorize('forceDelete', $product);
        if ($product->avatar) {
            $avatar = 'storage/images/product/avatar/' . $product->avatar;
            File::delete($avatar);
        }

        //Xóa các file ảnh mô tả
        $images = $product->Images;
        if ($images) {
            foreach ($images as $image) {
                $img = 'storage/images/product/description/' . $image->name;
                File::delete($img);
                $image->delete();
            }
        }
        $success = $product->forceDelete();
        $wearhouse->delete();
        if ($success)
            session()->flash('success', 'Xóa thành thành công sản phẩm '.$product->name);
        else
            session()->flash('error', 'Xóa thành thất bại');
        return redirect()->route('Product.trashed');
    }

    public function hardDeleteAll()
    {
        $products = Product::onlyTrashed()->get();
        foreach ($products as $product)
        {
            $wearhouse = Warehouse::where('product_id',$product->id);
            $this->authorize('forceDelete', $product);
            if ($product->avatar) {
                $avatar = 'storage/images/product/avatar/' . $product->avatar;
                File::delete($avatar);
            }

            //Xóa các file ảnh mô tả
            $images = $product->Images;
            if ($images) {
                foreach ($images as $image) {
                    $img = 'storage/images/product/description/' . $image->name;
                    File::delete($img);
                    $image->delete();
                }
            }
            $product->forceDelete();
            $wearhouse->delete();
        }
        session()->flash('success', 'Xóa thành công toàn bộ sản phẩm !');
        return redirect()->route('Product.trashed');
    }

    public function search(Request $request)
    {
        $products = Product::sortable()->where('name','like','%'.$request->get('key').'%')->get();
//        dd($products);
        foreach ($products as $product) {
            $category = $product->Category;
            $sale = $product->Sale;
            if (isset($sale) && $sale->status == 1) $product->price_sale = $sale->price_sale;
            $product->category = $category->name;
        }

        return view('backend.product.search')->with(['products' => $products,'key'=>$request->get('key')]);
    }
}
