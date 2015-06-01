<?php namespace App\Http\Controllers;

use App\Friend;
use App\Http\Requests;
use App\Http\Requests\AddFriendRequest;
use App\Http\Controllers\Controller;

use App\User;
use Request;

class FriendController extends Controller {

	/**
	 * Display all the people the given user follows
	 *
	 * @return Response
	 */
	public function index($user_id)
	{
		$user = User::find($user_id);
        $friends = $user->friends()->get();
        return view('pages.profile.myfollows',compact('friends'));
	}

    /**
     *
     * Display all the user's followers
     * @param $friend_id
     * @return mixed
     */
    public function followers($friend_id)
    {
        $followers = Friend::where('friend_id',$friend_id)->get();

        return $followers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param AddFriendRequest $request
     * @return Response
     */
	public function create()
	{

	}

	/**
	 * Store a new follow relation in storage.
	 *
	 * @return Response
	 */
	public function store(AddFriendRequest $request)
	{
        Friend::create($request->all());

        return redirect('posts');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
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
		//
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
