<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostComment;
use App\Product;
use App\Sale;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        //Lấy ra sản phẩm bán mới nhất
        $products_new = Product::latest()->paginate(10);
        foreach ($products_new as $product) {
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
            $product->avg = $avg;

        }

        foreach ($products_new as $product) {
            $sale = $product->Sale;
            if (isset($sale) && $sale->status) $product->sale = $sale->price_sale;
        }
//        dd($products_new);

        //Lấy ra sản phẩm sale
        $products_sale = Product::all();
        foreach ($products_sale as $product_sale) {
            $sale = $product_sale->Sale;
            if (isset($sale) && $sale->status) $product_sale->sale = $sale->price_sale;
        }
        foreach ($products_sale as $product_sale) {
            $rates_sale = $product_sale->Rates;
            $avg = 0;
            if ($rates_sale->count() > 0) {
                $i = 0;
                foreach ($rates_sale as $rate_sale) {
                    $avg += $rate_sale->rate;
                    $i++;
                }
                $avg = $avg / $i;
            }
            $product_sale->avg = $avg;
        }

        //Lấy ra bài viết
        $posts = Post::paginate(5);

//        dd($products_new);

//        dd($products_sale);

        return view('frontend.page.home')->with([
            'products_new' => $products_new,
            'products_sale' => $products_sale,
            'posts' => $posts
        ]);
    }

    public function Products($slug)
    {
        $category_data = Category::where('slug', $slug)->get();
        $category = $category_data->first();
        $categories_parent = Category::where('depth', 1)->get();
        $category_data = $this->getCategories($category_data);
        $category_id = $this->getCategoryId($category_data);
        $products = Product::whereIn('category_id', $category_id)->paginate(9);

        foreach ($products as $product) {
            $sale = $product->Sale;
            if (isset($sale) && $sale->status == 1) $product->sale = $sale->price_sale;

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
            $product->avg = $avg;
        }


        return view('frontend.page.products')->with([
            "category" => $category,
            "products" => $products,
            "categories_parent" => $categories_parent,
        ]);

    }

    public function Product($slug)
    {
        $product = Product::withTrashed()->where('slug', $slug)->first();
//        dd($product);
        $check = $this->checkOrderUser($product->id);
//        dd($check);
        $warehouse = Warehouse::where('product_id', $product->id)->first();

        $comments = $product->Comments;//Lấy comment
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

//        dd($rates->get());
//        dd($rates->get()->count());

        $product->remain = $warehouse->remain;//Kiểm tra số lượng trong kho
        $product->category = $product->Category->name;
//        dd($product->category);

        //Kiểm tra khuyến mãi
        $sale = $product->Sale;
        if (isset($sale) && $sale->status == 1) $product->sale = $sale->price_sale;


        //===Lấy ra các id của các danh mục cùng loại===
        $category_data = Category::where('id', $product->category_id)->get();
        $category_data = $this->getCategories($category_data);
        $category_id = $this->getCategoryId($category_data);

        //===Lấy các sản phẩm cùng loại===
        $products_related = Product::whereIn('category_id', $category_id)->paginate(5);
        foreach ($products_related as $value) {
            $rates_related = $value->Rates;
            $value->avg = 0;
            $i = 0;
            if ($rates_related->count() > 0) {
                foreach ($rates_related as $value2) {
                    $value->avg += $value2->rate;
                    $i++;
                }
                $value->avg = $value->avg / $i;
            }
//            dd($product->avg);

        }

        foreach ($products_related as $value) {
            $sale_2 = $value->Sale;
            if (isset($sale_2) && $sale_2->status == 1) $value->sale = $sale_2->price_sale;//Kiểm tra khuyến mãi
        }
        //===end===


        return view('frontend.page.product_detail')->with([
            'product' => $product,
            'products_related' => $products_related,
            'comments' => $comments,
            'rates' => $rates,
            'check' => $check,
            'avg' => $avg,
        ]);
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
                $category_id = array_merge($category_id, $this->getCategoryId($category->sub_category));
            }
        }
//        dd($category_id);
        return $category_id;
    }

    public function Blog()
    {
        $posts = Post::latest()->paginate(9);

        return view('frontend.page.post.posts')->with([
            'posts' => $posts
        ]);
    }

    public function Post($id)
    {
        $post = Post::find($id);
        $count = Cache::increment($post->id);
        if ($count>20){
            $post->view += Cache::pull($post->id);
            $post->save();
        }
        $posts = Post::paginate(6);
        $comments = $post->Comments;
        return view('frontend.page.post.post_single')->with([
            'post' => $post,
            'comments' => $comments,
            'posts' => $posts
        ]);
    }

    public function search(Request $request)
    {
        $key = $request->get('search');
        $products = Product::where('name', 'like', '%' . $key . '%')->get();
        $categories_parent = Category::whereDepth(1)->get();
        foreach ($products as $product) {
            $sale = $product->Sale;
            if (isset($sale) && $sale->status == 1) $product->sale = $sale->price_sale;
        }
        return view('frontend.page.search')->with([
            'key' => $key,
            'products' => $products,
            'categories_parent' => $categories_parent
        ]);
    }

    public function checkOrderUser($id)
    {
        if (Auth::user()) {
            $customer = Customer::where('user_id', Auth::user()->id)->first();
            if (isset($customer)) {
                $rate = $customer->Rates()->where('customer_id', $customer->id)->where('product_id', $id)->get();
                $oders = $customer->Oders()->select("id")->where("status", 1)->get();
                $count_oder = 0;
                $check = false;

                foreach ($oders as $oder) {
                    foreach ($oder->products as $value) {

                        if ($value->id == $id) {
                            $count_oder++;
                            $check = true;
                        }
                    }
                }
//                dd($count_oder);
                if ($check && $count_oder > $rate->count()) {
                    return true;
                }
            }
        }
        return false;
    }
}
