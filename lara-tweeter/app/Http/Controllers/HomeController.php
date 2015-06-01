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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
$user= Auth::user();
        $user = Auth::user($user->id);
        $friend_ids = $user->friends->lists('id');
        $tweets = DB::table('tweets')->whereIn('user_id', $friend_ids)->get();
		return view('home',['user' => $user, 'tweets' => $tweets]);
	}

}
