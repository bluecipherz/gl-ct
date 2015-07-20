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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('login', function() {
	return view('pages.login');
});

Route::get('search', function() {
	return view('pages.search');
});

Route::get('cart', function() {
	return view('pages.cart');
});

Route::get('register', function() {
	return view('pages.register');
});

Route::get('admin', function() {
	return 'ok';
});

Route::get('admin/{page}', 'AdminController@recieve');

Route::get('test', function() {
	return view('pages.test');
});

