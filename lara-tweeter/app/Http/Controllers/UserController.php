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
        if (Auth::check()) {

            $tweets = Tweet::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
            $f = User::find($id)->friends->lists('name');
            $followers_list = User::find($id)->followers();
            $followers_name_list = array();
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
	}

}
