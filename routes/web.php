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
Route::post('admin/login', 'Auth\LoginController@login')->name('login.store');

Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
Route::post('admin/register', 'Auth\RegisterController@register')->name('register.store');

Route::get('logout','Auth\LoginController@logout')->name('logout');




Route::group([
    'middleware'=>'auth',
    'namespace' => 'Backend',
    'prefix' => 'admin'
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('backend.dashboard');
    Route::get('/', 'DashboardController@index')->name('backend.dashboard');
    Route::resource('Product', 'ProductController');
    Route::resource('Category','CategoryController');
    Route::resource('User', 'UserController');
});


Route::group([
    'namespace'=>'Frontend'
],function (){
    Route::get('/','HomeController@index')->name('frontend.home');
    Route::get('Home','HomeController@index')->name('frontend.home');
    Route::get('About','HomeController@about')->name('frontend.about');
    Route::get('Contract','HomeController@contact')->name('frontend.contact');
});

Route::get('admin/test','Backend\UserController@test');
Route::get('admin/testC','Backend\CategoryController@test');
Route::get('admin/testP','Backend\ProductController@test');
Route::get('admin/ShowImage/{id?}','Backend\ProductController@showImage');
Route::get('admin/Category/ShowProduct/{id?}','Backend\CategoryController@showProduct');
Route::get('admin/User/ShowProduct/{id?}','Backend\UserController@showProduct');
Route::get('admin/Oder/ShowProduct/{id?}','Backend\OderController@showProduct');





//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
