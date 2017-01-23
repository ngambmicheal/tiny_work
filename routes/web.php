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
include('store.php');


Route::get('/', "IndexController@storelist");


Route::get('/login', "IndexController@login");
Route::post('/login', "LoginController@signin");
Route::post('/register', "LoginController@register");
Route::get('/register', 'IndexController@register');
Route::get('/register_success', "LoginController@register_success");
Route::get('/logout', "LoginController@logout");
Route::get('/contact', "IndexController@login");
Route::get('/create_store', 'IndexController@create_store');
Route::post('/create_store', 'IndexController@save_store');

	Route::get('/storelist', "IndexController@storelist");
	Route::get('/storelist/category/{id?}', "IndexController@storelist_cat");



Route::get('save_reviews', "IndexController@save_reviews");





Route::group(['prefix'=>'{username?}'], function(){

	Route::get('/', 'IndexController@show_store');
	Route::get('/products/{id?}', 'IndexController@show_store_products');
	Route::get('/category/{id?}', 'IndexController@show_store_category');
	Route::get('/sales/{id?}', 'IndexController@show_store_sales');
	Route::get('/employment/{view?}', "IndexController@store_employment");
	Route::post('/employment/emp_dets', "IndexController@complete_profile");
	Route::post('/employment/emp_prop', "IndexController@application");
});

