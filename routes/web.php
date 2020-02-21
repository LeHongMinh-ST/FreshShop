<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\HomeController;

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::get('login', 'Auth\LoginController@showLoginFormRegister')->name('login.form-guest');
Route::post('login', 'Auth\LoginController@login')->name('login.store');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
Route::post('register', 'Auth\RegisterController@register')->name('register.store');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('forgotPassword','Auth\ForgotPasswordController@showLinkRequestForm')->name('forgot.form');


//===Backend===
Route::group([
    'middleware' => 'auth',
    'namespace' => 'Backend',
    'prefix' => 'admin'
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('backend.dashboard');
    Route::get('/', 'DashboardController@admin');

    Route::group([
        'prefix' => 'Product'
    ], function () {
        Route::post('', 'ProductController@store')->name('Product.store');
        Route::get('', 'ProductController@index')->name('Product.index');
        Route::get('create', 'ProductController@create')->name('Product.create');
        Route::get('trashed', 'ProductController@trashed')->name('Product.trashed');
        Route::put('restore/{Product}', 'ProductController@restore')->name('Product.restore');
        Route::put('restoreAll','ProductController@restoreAll')->name('Product.restoreAll');
        Route::delete('delete/{Product}', 'ProductController@hardDelete')->name('Product.hardDelete');
        Route::delete('hardDeleteAll', 'ProductController@hardDeleteAll')->name('Product.hardDeleteAll');
        Route::delete('{Product}', 'ProductController@destroy')->name('Product.destroy');
        Route::put('{Product}', 'ProductController@update')->name('Product.update');
        Route::get('show/{Product}', 'ProductController@show')->name('Product.show');
        Route::get('{Product}/edit', 'ProductController@edit')->name('Product.edit');
        Route::get('Search','ProductController@search')->name('Product.search');

        Route::group([
            'prefix' => 'Sale'
        ], function () {
            Route::post('', 'SaleController@store')->name('Sale.store');
            Route::get('', 'SaleController@index')->name('Sale.index');
            Route::get('create/{Sale}', 'SaleController@create')->name('Sale.create');
            Route::delete('{Sale}', 'SaleController@destroy')->name('Sale.destroy');
            Route::put('{Sale}', 'SaleController@update')->name('Sale.update');
            Route::get('{Sale}', 'SaleController@show')->name('Sale.show');
            Route::get('{Sale}/edit', 'SaleController@edit')->name('Sale.edit');
        });
    });
    Route::group([
        'prefix' => 'Category'
    ], function () {
        Route::post('', 'CategoryController@store')->name('Category.store');
        Route::get('', 'CategoryController@index')->name('Category.index');
        Route::get('create', 'CategoryController@create')->name('Category.create');
        Route::get('trashed', 'CategoryController@trashed')->name('Category.trashed');
        Route::put('restore/{Category}', 'CategoryController@restore')->name('Category.restore');
        Route::delete('delete/{Category}', 'CategoryController@hardDelete')->name('Category.hardDelete');
        Route::delete('{Category}', 'CategoryController@destroy')->name('Category.destroy');
        Route::put('{Category}', 'CategoryController@update')->name('Category.update');
        Route::get('{Category}', 'CategoryController@show')->name('Category.show');
        Route::get('{Category}/edit', 'CategoryController@edit')->name('Category.edit');
    });

    Route::group([
        'prefix' => 'User'
    ], function () {
        Route::post('/', 'UserController@store')->name('User.store');
        Route::get('/', 'UserController@index')->name('User.index');
        Route::get('create', 'UserController@create')->name('User.create');
        Route::get('trashed', 'UserController@trashed')->name('User.trashed');
        Route::put('restore/{User}', 'UserController@restore')->name('User.restore');
        Route::put('update/{User}', 'UserController@update')->name('User.update');
        Route::put('updateRole/{User}', 'UserController@updateRole')->name('User.update-role');
        Route::delete('delete/{User}', 'UserController@hardDelete')->name('User.hardDelete');
        Route::delete('{User}', 'UserController@destroy')->name('User.destroy');
        Route::get('{User}', 'UserController@show')->name('User.show');
        Route::get('/search/member', 'UserController@search')->name('User.search');
        Route::get('{User}/edit', 'UserController@edit')->name('User.edit');
    });

    Route::group([
        'prefix' => 'Customer'
    ], function () {
        Route::post('', 'CustomerController@store')->name('Customer.store');
        Route::get('', 'CustomerController@index')->name('Customer.index');
        Route::get('create', 'CustomerController@create')->name('Customer.create');
        Route::get('trashed', 'CustomerController@trashed')->name('Customer.trashed');
        Route::delete('{Customer}', 'CustomerController@destroy')->name('Customer.destroy');
        Route::delete('delete/{Customer}', 'CustomerController@hardDelete')->name('Customer.hardDelete');
        Route::put('restore/{Customer}', 'CustomerController@restore')->name('Customer.restore');
        Route::put('{Customer}', 'CustomerController@update')->name('Customer.update');
        Route::get('{Customer}', 'CustomerController@show')->name('Customer.show');
        Route::get('{Customer}/edit', 'CustomerController@edit')->name('Customer.edit');
    });

    Route::group([
        'prefix' => 'Supplier'
    ], function () {
        Route::post('', 'SupplierController@store')->name('Supplier.store');
        Route::get('', 'SupplierController@index')->name('Supplier.index');
        Route::get('create', 'SupplierController@create')->name('Supplier.create');
        Route::get('trashed', 'SupplierController@trashed')->name('Supplier.trashed');
        Route::delete('{Supplier}', 'SupplierController@destroy')->name('Supplier.destroy');
        Route::delete('delete/{Supplier}', 'SupplierController@hardDelete')->name('Supplier.hardDelete');
        Route::put('restore/{Supplier}', 'SupplierController@restore')->name('Supplier.restore');
        Route::put('{Supplier}', 'SupplierController@update')->name('Supplier.update');
        Route::get('{Supplier}', 'SupplierController@show')->name('Supplier.show');
        Route::get('{Supplier}/edit', 'SupplierController@edit')->name('Supplier.edit');
    });



    Route::group([
        'prefix' => 'Warehouse'
    ], function () {
        Route::post('', 'WarehouseController@store')->name('Warehouse.store');
        Route::get('', 'WarehouseController@index')->name('Warehouse.index');
        Route::get('update/{Warehouse}', 'WarehouseController@update')->name('Warehouse.update');
    });

    Route::group([
        'prefix' => 'Post'
    ], function () {
        Route::post('', 'PostController@store')->name('Post.store');
        Route::get('', 'PostController@index')->name('Post.index');
        Route::get('create', 'PostController@create')->name('Post.create');
        Route::get('trashed', 'PostController@trashed')->name('Post.trashed');
        Route::delete('{Post}', 'PostController@destroy')->name('Post.destroy');
        Route::delete('delete/{Post}', 'PostController@hardDelete')->name('Post.hardDelete');
        Route::put('restore/{Post}', 'PostController@restore')->name('Post.restore');
        Route::put('{Post}', 'PostController@update')->name('Post.update');
        Route::get('{Post}', 'PostController@show')->name('Post.show');
        Route::get('search/post','PostController@search')->name('Post.search');
        Route::get('{Post}/edit', 'PostController@edit')->name('Post.edit');
        Route::post('comment/{comment}','PostCommentController@store')->name('frontend.post_comment');
        Route::delete('comment/{comment}','PostCommentController@destroy')->name('frontend.post_comment.destroy');
    });

    Route::group([
        'prefix' => 'Oder'
    ], function () {
        Route::get('', 'OderController@index')->name('Oder.index');
        Route::post('ship/{id}', 'OderController@ship')->name('Oder.ship');
        Route::post('success/{id}', 'OderController@success')->name('Oder.success');
        Route::delete('{Oder}', 'OderController@destroy')->name('Oder.destroy');
        Route::delete('delete/{Oder}', 'OderController@hardDelete')->name('Oder.hardDelete');
        Route::get('{Oder}', 'OderController@show')->name('Oder.show');
        Route::get('search','OderController@search')->name('Oder.search');
    });

    Route::group([
        'prefix'=>'Import'
        ],function (){
        Route::get('','ImportController@index')->name('Import.index');
        Route::put('update/{import}','ImportController@update')->name('Import.update');
        Route::get('show/{import}','ImportController@show')->name('Import.show');
        Route::post('store','ImportController@store')->name('Import.store');
        Route::get('create','ImportController@create')->name('Import.create');
        Route::post('send','ImportController@send')->name('Import.send');
        Route::delete('delete/cart','ImportController@deleteCart')->name('Import.delete_cart');
        Route::delete('destroy/{import}','ImportController@destroy')->name('Import.destroy');
        Route::delete('Hard_delete/{import}','ImportController@hardDelete')->name('Import.hardDelete');
        Route::post('success/{import}','ImportController@success')->name('Import.success');
        Route::delete('delete/item/{import}','ImportController@deleteItem')->name('Import.delete_item');

    });

    Route::group([
        'prefix'=>'Comment'
    ],function (){
        Route::post('{Comment}','CommentController@store')->name('Comment.store');
        Route::delete('{Comment}','CommentController@destroy')->name('Comment.destroy');
    });

    Route::group([
        'prefix'=>'Rate'
    ],function (){
        Route::post('{Rate}','RateController@store')->name('Rate.store');
    });

    Route::get('Ajax/statistical/oder','AjaxController@statisticalOder');
    Route::get('Ajax/statistical/revenue','AjaxController@revenue');

    Route::get('statistic','StatisticController@index')->name('Statistic.index');
});

//===Frontend===
Route::group([
    'namespace' => 'Frontend'
], function () {
    Route::get('/', 'HomeController@index')->name('frontend.home');
    Route::get('Home', 'HomeController@index')->name('frontend.home');
    Route::get('About', 'HomeController@about')->name('frontend.about');
    Route::get('Contract', 'HomeController@contact')->name('frontend.contact');
    Route::get('Product/{slug?}', 'HomeController@Products')->name('frontend.products');
    Route::get('Product/detail/{slug?}', 'HomeController@Product')->name('frontend.detail');
    Route::get('Search','HomeController@search')->name('frontend.search');
    Route::get("/ajax/quickProduct/{id}", "AjaxController@singleProduct");

    Route::group([
        'prefix'=>'Blog'
    ],function (){
        Route::get('','HomeController@Blog')->name('frontend.blog');
        Route::get('{blog}','HomeController@Post')->name('frontend.post');

    });
    Route::group([
        'prefix' => 'Cart',
    ], function () {
        Route::post('/create/{cart}','CartController@store')->name('cart.store');
        Route::post('/createAjax', 'CartController@storeAjax')->name('cart.storeAjax');
        Route::get('/', 'CartController@index')->name('cart.index');
        Route::put('{Cart}', 'CartController@update')->name('cart.update');
        Route::delete('delete/{Cart}', 'CartController@delete')->name('cart.delete');
        Route::delete('destroy', 'CartController@destroy')->name('cart.destroy');
        Route::put('update/{Cart}','CartController@update')->name('cart.update');
    });
    Route::group([
        'prefix'=>'Checkout'
    ], function () {
        Route::get('/method','CheckoutController@index')->name('checkout.method');
        Route::get('/get_method','CheckoutController@method')->name('checkout.get_method');
        Route::get('/invoice','CheckoutController@invoice')->name('checkout.invoice');
        Route::post('/store','CheckoutController@store')->name('checkout.store');
    });

});

//Route::get('admin/test','Backend\UserController@test');
//Route::get('admin/testC','Backend\CategoryController@test');
//Route::get('admin/testP','Backend\ProductController@test');
//Route::get('admin/ShowImage/{id?}','Backend\ProductController@showImage');
//Route::get('admin/Category/ShowProduct/{id?}','Backend\CategoryController@showProduct');
//Route::get('admin/User/ShowProduct/{id?}','Backend\UserController@showProduct');
//Route::get('admin/Oder/ShowProduct/{id?}','Backend\OderController@showProduct');


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get/{id}', 'HomeController@get');
Route::get('cookie/set', 'HomeController@setCookie');
Route::get('cookie/get', 'HomeController@getCookie');



