<?php namespace App\Http\Controllers;


use App\User;
use Auth;
use DB;
use App\Tweet;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Creates the feeds
	 *
	 * @return Response
	 */
	public function index()
	{
$user= Auth::user();
        $user = Auth::user($user->id);
        $friend_ids = $user->friends->lists('id');
        $friend_ids[] = $user->id;
        $tweets = Tweet::whereIn('user_id', $friend_ids)->orderBy('created_at','desc')->get();
		return view('home',['user' => $user, 'tweets' => $tweets]);
	}

}
