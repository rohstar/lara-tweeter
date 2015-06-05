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

//    Route::get('post', 'TweetController@index');
//    Route::get('post/make', 'TweetController@create');
//    Route::get('post/{id}', 'TweetController@show');
//    Route::post('post', 'TweetController@store');

Route::get('gototwitter', function(){

    return \Socialite::with('twitter')->redirect();

});

Route::get('twitter', function(){

    $user = \Socialite::with('twitter')->user();
    dd($user);

});

Route::get('gotofacebook', function(){
    return \Socialite::with('facebook')->redirect();
});

Route::get('facebook', function(){
    $user = \Socialite::with('facebook')->user();
    dd($user);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
