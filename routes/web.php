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


Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::get('login', 'Auth\LoginController@showLoginFormRegister')->name('login.form-guest');
Route::post('login', 'Auth\LoginController@login')->name('login.store');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
Route::post('register', 'Auth\RegisterController@register')->name('register.store');

Route::get('logout','Auth\LoginController@logout')->name('logout');



//===Backend===
Route::group([
    'middleware'=>'auth',
    'namespace' => 'Backend',
    'prefix' => 'admin'
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('backend.dashboard');
    Route::get('/', 'DashboardController@index')->name('backend.dashboard');

    Route::group([
        'prefix'=>'Product'
    ],function (){
        Route::post('','ProductController@store')->name('Product.store');
        Route::get('','ProductController@index')->name('Product.index');
        Route::get('create','ProductController@create')->name('Product.create');
        Route::get('trashed','ProductController@trashed')->name('Product.trashed');
        Route::put('restore/{Product}','ProductController@restore')->name('Product.restore');
        Route::delete('delete/{Product}','ProductController@hardDelete')->name('Product.hardDelete');
        Route::delete('{Product}','ProductController@destroy')->name('Product.destroy');
        Route::put('{Product}','ProductController@update')->name('Product.update');
        Route::get('{Product}','ProductController@show')->name('Product.show');
        Route::get('{Product}/edit','ProductController@edit')->name('Product.edit');
    });
    Route::group([
        'prefix'=>'Category'
    ],function (){
        Route::post('','CategoryController@store')->name('Category.store');
        Route::get('','CategoryController@index')->name('Category.index');
        Route::get('create','CategoryController@create')->name('Category.create');
        Route::get('trashed','CategoryController@trashed')->name('Category.trashed');
        Route::put('restore/{Category}','CategoryController@restore')->name('Category.restore');
        Route::delete('delete/{Category}','CategoryController@hardDelete')->name('Category.hardDelete');
        Route::delete('{Category}','CategoryController@destroy')->name('Category.destroy');
        Route::put('{Category}','CategoryController@update')->name('Category.update');
        Route::get('{Category}','CategoryController@show')->name('Category.show');
        Route::get('{Category}/edit','CategoryController@edit')->name('Category.edit');
    });

    Route::group([
        'prefix'=>'User'
    ],function (){
        Route::post('','UserController@store')->name('User.store');
        Route::get('','UserController@index')->name('User.index');
        Route::get('create','UserController@create')->name('User.create');
        Route::get('trashed','UserController@trashed')->name('User.trashed');
        Route::put('restore/{User}','UserController@restore')->name('User.restore');
        Route::delete('delete/{User}','UserController@hardDelete')->name('User.hardDelete');
        Route::delete('{User}','UserController@destroy')->name('User.destroy');
        Route::put('{User}','UserController@update')->name('User.update');
        Route::get('{User}','UserController@show')->name('User.show');
        Route::get('{User}/edit','UserController@edit')->name('User.edit');
    });

    Route::group([
        'prefix'=>'Customer'
    ],function (){
        Route::post('','CustomerController@store')->name('Customer.store');
        Route::get('','CustomerController@index')->name('Customer.index');
        Route::get('create','CustomerController@create')->name('Customer.create');
        Route::get('trashed','CustomerController@trashed')->name('Customer.trashed');
        Route::delete('{Customer}','CustomerController@destroy')->name('Customer.destroy');
        Route::put('{Customer}','CustomerController@update')->name('Customer.update');
        Route::get('{Customer}','CustomerController@show')->name('Customer.show');
        Route::get('{Customer}/edit','CustomerController@edit')->name('Customer.edit');
    });

    Route::group([
        'prefix'=>'Supplier'
    ],function (){
        Route::post('','SupplierController@store')->name('Supplier.store');
        Route::get('','SupplierController@index')->name('Supplier.index');
        Route::get('create','SupplierController@create')->name('Supplier.create');
        Route::get('trashed','SupplierController@trashed')->name('Supplier.trashed');
        Route::delete('{Supplier}','SupplierController@destroy')->name('Supplier.destroy');
        Route::delete('delete/{Supplier}','SupplierController@hardDelete')->name('Supplier.hardDelete');
        Route::put('restore/{Supplier}','SupplierController@restore')->name('Supplier.restore');
        Route::put('{Supplier}','SupplierController@update')->name('Supplier.update');
        Route::get('{Supplier}','SupplierController@show')->name('Supplier.show');
        Route::get('{Supplier}/edit','SupplierController@edit')->name('Supplier.edit');
    });

    Route::group([
        'prefix'=>'Sale'
    ],function (){
        Route::post('','SaleController@store')->name('Sale.store');
        Route::get('','SaleController@index')->name('Sale.index');
        Route::get('create/{Sale}','SaleController@create')->name('Sale.create');
        Route::delete('{Sale}','SaleController@destroy')->name('Sale.destroy');
        Route::put('{Sale}','SaleController@update')->name('Sale.update');
        Route::get('{Sale}','SaleController@show')->name('Sale.show');
        Route::get('{Sale}/edit','SaleController@edit')->name('Sale.edit');
    });

    Route::group([
        'prefix'=>'Warehouse'
    ],function (){
        Route::post('','WarehouseController@store')->name('Warehouse.store');
        Route::get('','WarehouseController@index')->name('Warehouse.index');
        Route::get('create/{Warehouse}','WarehouseController@create')->name('Warehouse.create');
    });

//    Route::resource('Category','CategoryController');
//    Route::resource('User', 'SupplierController');
//    Route::resource('Import', 'ImportController');
//    Route::get('product/edit/{product}',function (\App\Product $product){
//        dd($product);
//    })->middleware('can:update,product');
});

//===Frontend===
Route::group([
    'namespace'=>'Frontend'
],function (){
    Route::get('/','HomeController@index')->name('frontend.home');
    Route::get('Home','HomeController@index')->name('frontend.home');
    Route::get('About','HomeController@about')->name('frontend.about');
    Route::get('Contract','HomeController@contact')->name('frontend.contact');
    Route::get('Product/{slug?}','HomeController@Products')->name('frontend.products');
    Route::get('Product/detail/{slug?}','HomeController@Product')->name('frontend.detail');
    Route::get('Cart/{id}','HomeController@Cart')->name('frontend.cart');
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
Route::get('/get', 'HomeController@get');
Route::get('cookie/set', 'HomeController@setCookie');
Route::get('cookie/get', 'HomeController@getCookie');


