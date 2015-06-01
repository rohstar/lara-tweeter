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
Route::get('user/{id}', 'UserController@show');
Route::get('user/{id}/{post_id}', 'UserController@showUserPost');
Route::get('user/all', 'UserController@showUserPost');

Route::post('friend','FriendController@store');

Route:resource('tweet','TweetController');

//    Route::get('post', 'TweetController@index');
//    Route::get('post/make', 'TweetController@create');
//    Route::get('post/{id}', 'TweetController@show');
//    Route::post('post', 'TweetController@store');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
