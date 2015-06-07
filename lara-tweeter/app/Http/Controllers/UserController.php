<?php namespace App\Http\Controllers;

use App\User;
use App\Tweet;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;use Laracasts\Flash\Flash;


class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

    /**
     * @param $id
     * @return \Illuminate\View\View
     */

    public function showUserPost($id, $post_id)
    {
        $tweets = Tweet::where('user_id',$id)->where('id',$post_id)->get();
        return $tweets;
    }

    public function allUsers()
    {
       $users = User::all();

       return view('pages.allusers', compact('users'));
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Show's the user's profile. the
	 * package array contains a list
     * of the user's tweets and an
     * array that has the user id
     * and friend's names.
     *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // put all people followed into $f

        if (Auth::check()) {

            $tweets = Tweet::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
            $f = User::find($id)->friends->lists('name');

            // put all followers into $follower_list
            $followers_list = User::find($id)->followers();
            $followers_name_list = array();
            // find all follower names from ids.
            foreach ($followers_list as $followr) {
                $followers_name_list[] = User::find($followr)->name;
            }
            $follower_count = sizeof($followers_list);

            $package = array(User::findOrFail($id), $f, $followers_name_list, $follower_count);
            if (Auth::user()->follows($id)) {
                return view('pages.profile.profile', ['idFriendsFollowersFollowCount' => $package], ['tweets' => $tweets]);
            } else
                return view('pages.profile.notfriend', ['idAndFriends' => $package]);
        } else {

            Flash::error('Must be logged in to view this page!');
            return redirect(url('/'));
        }
//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
//		$info = User::findOrFail($id);
//
//        return view('pages.profile.edit', compact($info));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function socialLogin(){

       return \Socialite::with('twitter')->redirect();

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
