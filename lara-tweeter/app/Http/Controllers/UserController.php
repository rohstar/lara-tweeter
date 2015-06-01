<?php namespace App\Http\Controllers;

use App\User;
use App\Tweet;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;


class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
      /*  $tweets = Tweet::where('user_id','=',$id)->get();
        return view('pages.profile', ['user' => User::findOrFail($id)],['tweets' => $tweets]);*/
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
        $tweets = Tweet::where('user_id','=',$id)->get();
        //$tweets = User::find($id)->tweets->toArray());
        $f = User::find($id)->friends->lists('name');
        $package = array(User::findOrFail($id),$f);
        return view('pages.profile.profile', ['idAndFriends' => $package],['tweets' => $tweets]);
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
	public function update($id)
	{
		//
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
