<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        //Lấy ra sản phẩm bán mới nhất
        $products_new = Product::latest()->get();
        foreach ($products_new as $product)
        {
            $sale = $product->Sale;
            if (isset($sale) && $sale->status) $product->sale = $sale->price_sale;
        }

        //Lấy ra sản phẩm sale
        $products_sale = Product::all();
        foreach ($products_sale as $product_sale)
        {
            $sale = $product_sale->Sale;
            if (isset($sale) && $sale->status) $product_sale->sale = $sale->price_sale;
        }

//        dd($products_sale);

        return view('frontend.page.home')->with(['products_new' => $products_new,'products_sale'=>$products_sale]);
    }

    public function Products($slug)
    {
        $category_data = Category::where('slug', $slug)->get();
        $category = $category_data->first();
        $categories_parent = Category::where('depth',1)->get();
//        dd($category_parent);
        $category_data = $this->getCategories($category_data);
        $category_id = $this->getCategoryId($category_data);
        $products = Product::whereIn('category_id', $category_id)->get();
        foreach ($products as $product)
        {
            $sale = $product->Sale;
            if (isset($sale) && $sale->status == 1) $product->sale = $sale->price_sale;
        }

        return view('frontend.page.products')->with([
            "category" => $category,
            "products" => $products,
            "categories_parent"=>$categories_parent
        ]);

    }

    public function Product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->category = $product->Category->name;
        $sale = $product->Sale;
        if (isset($sale) && $sale->status == 1) $product->sale = $sale->price_sale;


        $category_data = Category::where('id',$product->category_id)->get();
//        dd($category_data);
        $category_data = $this->getCategories($category_data);
        $category_id = $this->getCategoryId($category_data);
        $products_related = Product::whereIn('category_id', $category_id)->paginate(5);

        foreach ($products_related as $value)
        {
            $sale_2  = $value->Sale;
            if (isset($sale_2) && $sale_2->status == 1) $value->sale = $sale_2->price_sale;
        }

//        dd($products_related);
        return view('frontend.page.product_detail')->with(['product' => $product,'products_related'=>$products_related]);
    }

    public function about()
    {
        return view('frontend.page.about');
    }

    public function contact()
    {
        return view('frontend.page.contact');
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

    //Lấy sản phẩm từ danh mục
    private function getCategoryId($parent_categories)
    {
//        dd($parent_categories);
        foreach ($parent_categories as $category) {
            $category_id[] = $category->id;

            if ($category->has_child) {
                $category_id = array_merge($category_id,$this->getCategoryId($category->sub_category));
            }
        }
//        dd($category_id);
        return $category_id;
    }
}
