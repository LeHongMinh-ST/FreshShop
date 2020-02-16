<?php

namespace App\Providers;

use App\Category;
use App\Customer;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\SalePolicy;
use App\Policies\SupplierPolicy;
use App\Policies\UserPolicy;
use App\Product;
use App\Supplier;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        Category::class => CategoryPolicy::class,
        User::class => UserPolicy::class,
        Supplier::class => SupplierPolicy::class,
        Sale::class =>SalePolicy::class,
        Customer::class =>CustomerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('update-product', function ($user, $product){
//            return $user->id == $product->user_id;
//        });
//
        Gate::define('view-dashboard', function ($user) {
            return $user->role !== 0;
        });
    }
}
