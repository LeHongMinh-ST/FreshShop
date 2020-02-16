<?php

namespace App\Providers;

use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Xử lý menu đa cấp
        $mega_menu = Cache::remember('menu', 60*60*24*7, function() {
            $categories = Category::where('parent_id',0)->get();
            $categories = $this->addSubMenu($categories);
            return $categories;
        });

        $parent_categories = $this->getHtmlSubmenu($mega_menu);

        $count = Cart::count();
        View::share([
            'parent_categories'=>$parent_categories,
            'count'=>$count
        ]);

        Schema::defaultStringLength(191);
    }


    //Hàm xử lý đệ quy Html
    private function getHtmlSubmenu($parent_categories){
        if($parent_categories[0]->parent_id == 0){
            $html = "<ul class='sub-menu'>";
        }else{
            $html = "<ul>";
        }
        foreach ($parent_categories as $parent_category){
            $html .= "<li><a href='".url('Product/'.$parent_category->slug) . "'> " . $parent_category->name ." > </a>";
            if($parent_category->has_child){
                $subhtml = $this->getHtmlSubmenu($parent_category->sub_menu);
                $html .= $subhtml;
            }
            $html .= "</li>";
        }
        $html .= "</ul>";
        return  $html;
    }

    //Hàm xử lý đệ quy lấy ra dữ liệu danh mục đa cấp
    private function addSubMenu($parent_categories){
        foreach($parent_categories as $category){
            $count = Category::where('parent_id',$category->id)->count();
            if($count !=0){
                $category->has_child = true;
                $sub = Category::where('parent_id',$category->id)->get();
                $this->addSubMenu($sub);
                $category->sub_menu = $sub;
            }else{
                $category->sub_menu = false;
            }
        }
        return $parent_categories;
    }
}
