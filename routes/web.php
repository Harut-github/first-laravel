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

/*Route::get('/', function () {
    return view('welcome');
});*/




Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/search', 'SearchController@index');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');	
Route::post('/comment', 'BlogController@comment');

Route::get('/cart', 'BlogController@cart');

Route::get('/shop', 'ShopController@index');
Route::get('/shop/{slug}', 'ShopController@show')->name('shop.show');



Route::group(['middleware'=>'auth'], function(){
	Route::get('/cabinet', 'HomeController@cabinet');
});


/*Route::group(['middleware'=>'auth'], function(){
	
});*/
/*Route::resource('/blog/{slug}', 'BlogController@show');*//*->name('blog.show');*/
/*Route::get('/admin', 'Admin\DashboardController@index');*/
/*Route::resource('/admin/categories', 'Admin\CategoriesController');*/
		//papkayi hascena     //controllery hascena



// esi sax adminki hamara
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'], function(){
	Route::get('/', 'DashboardController@index');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/tags', 'TagsController');
	Route::resource('/posts', 'PostsController');
	Route::resource('/products', 'ProductsController');
	Route::resource('/users', 'UsersController');

});


