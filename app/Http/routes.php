<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => 'web'], function () {

	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

	Route::get('/search/{search?}', ['as' => 'search', 'uses' => 'SearchController@search']);

	Route::get('/shoppingcart', ['as' => 'shoppingcart', 'uses' => 'CartController@list']);

	Route::get('/checkout', ['as' => 'checkout', 'uses' => 'CartController@checkout']);

	Route::get('/add-cart/{product_id}', ['as' => 'cart_add', 'uses' => 'CartController@add']);

	Route::get('/profile', [
		'as' => 'profile', 
		'middleware' => 'auth', 
		'uses' => 'UserController@showProfile'
	]);

	Route::post('/vote', [
		'as' => 'vote',
		'middleware' => 'auth',
		'uses' => 'VotingController@store',
	]);
	
	Route::resource('categories', 'CategoryController', ['only' => ['show', 'index']]);

	Route::resource('products', 'ProductController', ['only' => ['show', 'index']]);

	Route::resource('users', 'UserController', ['only' => ['show', 'index', 'edit', 'update']]);

	Route::group(['prefix' => 'products/{id}', 'as' => 'products::'], function () {
		Route::get('/', 'ProductController@show');

		Route::resource('comments', 'CommentController', [
			'except' => ['index', 'create', 'edit'], 
			'names' => [
				'show' => 'comments.show',
				'store' => 'comments.store',
				'update' => 'comments.update',
				'destroy' => 'comments.destroy',
			]]);
		
		Route::resource('reviews', 'ReviewController', ['names' => [
			'index' => 'reviews.index',
			'show' => 'reviews.show',
			'create' => 'reviews.create',
			'store' => 'reviews.store',
			'edit' => 'reviews.edit',
			'update' => 'reviews.update',
			'destroy' => 'reviews.destroy',
			]]);
		Route::group(['prefix' => 'reviews/{review_id}', 'as' => 'reviews::'], function () {
			Route::get('/', 'ReviewController@show');

			Route::resource('comments', 'CommentController', ['except' => ['index', 'create', 'edit'], 
				'names' => [
				'show' => 'comments.show',
				'store' => 'comments.store',
				'update' => 'comments.update',
				'destroy' => 'comments.destroy',
			]]);
		});
		
	});
	
	Route::get('change-pass/{id}', ['as' => 'change_pass', 'middleware' => 'auth', 'uses' => 'UserController@change_pass']);
	Route::post('change-pass/{id}', ['as' => 'update_pass', 'middleware' => 'auth', 'uses' => 'UserController@update_pass']);

	// Route to get photo from Storage and response to browser
	Route::get('photo/get/{name}', ['as' => 'get_photo', 'uses' => 'PhotoController@getPhoto']);

});

Route::auth();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

		Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);

		Route::resource('categories', 'CategoryController');
		Route::resource('products', 'ProductController');
		Route::resource('users', 'UserController', ['except' => ['create', 'store']]);

	}
);

// Categories
Route::get('/test', function () {
	Cart::add('192ao12', 'Product 1', 1, 9.99);
	Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);

	return view('test');
});
