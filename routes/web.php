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


Route::group([
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
