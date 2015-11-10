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
use App\Http\Requests;
use App\Http\Controllers;

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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('social/login', function() {
    return OAuth::authorize('facebook');
});

Route::get('facebook', function() {
//    try {
//        OAuth::login('facebook');
//    } catch (ApplicationRejectedException $e) {
//        return 'User rejected application';
//    } catch (InvalidAuthorizationCodeException $e) {
//        return 'Authorization was attempted with invalid';
//        // code,likely forgery attempt
//    }
//    // Current user is now available via Auth facade
    OAuth::login('facebook', function($user, $details) {
        $user->nickname = $details->nickname;
        $user->name = $details->fullName;
        $user->profile_image = $details->avatar;
        $user->save();
    });

});



//Route:resource('tweet','TweetController');
//
//Route::get('gototwitter', function(){
//
//    return \Socialite::with('twitter')->redirect();
//
//});
//
//Route::get('twitter', function(){
//    $user = \Socialite::with('twitter')->user();
//});
//
//Route::get('gotofacebook', function(){
//    return \Socialite::with('facebook')->redirect();
//});
//
//Route::get('facebook', function(){
//    $user = \Socialite::with('facebook')->user();
//    $user_dets = Array(
//        $user->getId(),
//        $user->getName(),
//        $user->getEmail(),
//        $user->getAvatar()
//    );
//
//    if(User::where('email', '=', $user_dets[2])->exists()){
//        Flash::message('User exists, login!');
//        redirect(url('auth/login'));
//    }
//    return view('auth.facebook',['user_dets' => $user_dets]);
//});

