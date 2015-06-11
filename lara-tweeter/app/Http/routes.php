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
Route::get('profile/{id}', 'UserController@show');
Route::get('user', function() {

    return redirect(url('user',Auth::user()->id));
});

Route::get('all', 'UserController@allUsers');

Route::get('user/{id}', 'UserController@show');
Route::get('user/{id}/{post_id}', 'UserController@showUserPost');
Route::get('user/all', 'UserController@showUserPost');

Route::post('friend','FriendController@store');
Route::post('unfriend','FriendController@destroy');


Route:resource('tweet','TweetController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
