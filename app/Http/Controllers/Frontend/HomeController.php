<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('frontend.page.home')->with(['products' => $products]);
    }

    public function Products($slug)
    {
        $category_data = Category::where('slug', $slug)->get();
        $category = $category_data->first();
        $category_data = $this->getCategories($category_data);

        $category_id = $this->getCategoryId($category_data);
//

        $products = Product::whereIn('category_id', $category_id)->get();
//        dd($category_id);

        return view('frontend.page.products')->with(["category" => $category, "products" => $products]);

    }

    public function Product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.page.product_detail')->with(['product' => $product]);
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
        foreach ($parent_categories as $category) {
            $category_id[] = $category->id;
            if ($category->has_child) {
                $category_id = array_merge($category_id,$this->getCategoryId($category->sub_category));
            }
        }
        return array_unique($category_id);
    }
}
