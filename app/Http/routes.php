<?php


Route::get('/', function () {

	$categories = \App\Category::All();
	$products = \App\Product::All();

    return view('home', compact('categories', 'products'));
});


Route::get('/home', 'HomeController@index');

Route::auth();

/********************* category ***********************************************/

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


//category Resources
/********************* category ***********************************************/
Route::resource('detail','\App\Http\Controllers\PagesController');
Route::post('detail/{id}/update','\App\Http\Controllers\PagesController@update');
Route::get('detail/{id}/delete','\App\Http\Controllers\PagesController@destroy');
Route::get('detail/{id}/deleteMsg','\App\Http\Controllers\PagesController@DeleteMsg');
/********************* category ***********************************************/



//category Resources
/********************* category ***********************************************/
Route::resource('category','\App\Http\Controllers\CategoryController');
Route::post('category/{id}/update','\App\Http\Controllers\CategoryController@update');
Route::get('category/{id}/delete','\App\Http\Controllers\CategoryController@destroy');
Route::get('category/{id}/deleteMsg','\App\Http\Controllers\CategoryController@DeleteMsg');
/********************* category ***********************************************/



//product Resources
/********************* product ***********************************************/
Route::resource('product','\App\Http\Controllers\ProductController');
Route::post('product/{id}/update','\App\Http\Controllers\ProductController@update');
Route::get('product/{id}/delete','\App\Http\Controllers\ProductController@destroy');
Route::get('product/{id}/deleteMsg','\App\Http\Controllers\ProductController@DeleteMsg');
/********************* product ***********************************************/


//customer Resources
/********************* customer ***********************************************/
Route::resource('customer','\App\Http\Controllers\CustomerController');
Route::post('customer/{id}/update','\App\Http\Controllers\CustomerController@update');
Route::get('customer/{id}/delete','\App\Http\Controllers\CustomerController@destroy');
Route::get('customer/{id}/deleteMsg','\App\Http\Controllers\CustomerController@DeleteMsg');
/********************* customer ***********************************************/



//oder Resources
/********************* oder ***********************************************/
Route::resource('oder','\App\Http\Controllers\OderController');
Route::post('oder/{id}/update','\App\Http\Controllers\OderController@update');
Route::get('oder/{id}/delete','\App\Http\Controllers\OderController@destroy');
Route::get('oder/{id}/deleteMsg','\App\Http\Controllers\OderController@DeleteMsg');
/********************* oder ***********************************************/


//order_detail Resources
/********************* order_detail ***********************************************/
Route::resource('order_detail','\App\Http\Controllers\Order_detailController');
Route::post('order_detail/{id}/update','\App\Http\Controllers\Order_detailController@update');
Route::get('order_detail/{id}/delete','\App\Http\Controllers\Order_detailController@destroy');
Route::get('order_detail/{id}/deleteMsg','\App\Http\Controllers\Order_detailController@DeleteMsg');
/********************* order_detail ***********************************************/


//address Resources
/********************* address ***********************************************/
Route::resource('address','\App\Http\Controllers\AddressController');
Route::post('address/{id}/update','\App\Http\Controllers\AddressController@update');
Route::get('address/{id}/delete','\App\Http\Controllers\AddressController@destroy');
Route::get('address/{id}/deleteMsg','\App\Http\Controllers\AddressController@DeleteMsg');
/********************* address ***********************************************/

