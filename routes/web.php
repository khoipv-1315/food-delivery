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
Route::get('/', 'Sites\HomeController@index')->name('index');
Route::get('404', 'Sites\HomeController@view404')->name('404');
Route::get('contact', 'Sites\HomeController@viewContact')->name('contact');
Route::get('topfood', 'Sites\HomeController@viewTopFood')->name('topFood');
Route::get('discount', 'Sites\HomeController@viewDiscountFood')->name('discountFood');
Route::post('search', 'Sites\HomeController@searchFood')->name('search');
Route::resource('review', 'Sites\ReviewController');
Route::group(['prefix' => 'cart'], function () {
	Route::post('add/{id}', 'Sites\CartController@addToCart')->name('addToCart');
	Route::get('remove/{id}', 'Sites\CartController@removeFromCart')->name('removeFromCart');
	Route::post('update/{id}', 'Sites\CartController@updateCart')->name('updateCart');
	Route::post('check', 'Sites\CartController@checkEmail')->name('checkEmail');
    Route::get('destroy', 'Sites\CartController@destroyCart')->name('destroyCart');
});
Route::resource('cart', 'Sites\CartController');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admins', 'middleware' => 'AdminMiddleware'], function () {
    Route::resource('/user', 'UserController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/discount', 'DiscountController');
    Route::resource('/food', 'FoodController');
    Route::resource('/order', 'OrderController');
    Route::resource('/review', 'ReviewController');
    Route::get('/search', 'UserController@search');
    Route::get('/search/food', 'FoodController@search');
    Route::get('/order/detail/{id}', 'OrderController@orderDetail')->name('order.detailOrder');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'UserController@profile')->name('profile');
});
Route::resource('category', 'Sites\CategoryController', ['only' => ['index',
    'show',
]]);
Route::get('food/{id}', 'Sites\FoodController@index')->name('food');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('getLogin');
Route::post('login', 'Auth\LoginController@login')->name('postLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('getRegister');
Route::post('register', 'Auth\RegisterController@register')->name('postRegister');

Route::prefix('password')->group(function () {
    Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('reset', 'Auth\ResetPasswordController@reset');
});

Route::get('profile', 'Sites\UserController@showProfile')->name('showProfile');
Route::get('editprofile', 'Sites\UserController@getProfile')->name('getProfile');
Route::post('editprofile', 'Sites\UserController@editProfile')->name('editProfile');
Route::get('order', 'Sites\OrderController@index')->name('order');
Route::get('order/{id}', 'Sites\OrderController@show')->name('order_detail');
Route::get('remove/{id}', 'Sites\OrderController@remove')->name('removeOrder');
