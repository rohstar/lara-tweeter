<?php namespace App\Http\Controllers;

use App\Friend;
use App\Http\Requests;
use App\Http\Requests\AddFriendRequest;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Auth;
use Request;
use Flash;

class FriendController extends Controller {

	/**
	 * Display all the people the given user follows
	 *
	 * @return Response
	 */
	public function index($user_id)
	{
    }

    /**
     *
     * Display all the user's followers
     * @param $friend_id
     * @return mixed
     */
    public function followers($friend_id)
    {
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
        Auth::user()->addFriend($request->get('hidden'));
        Flash::success('Followed!');
        return redirect('/');
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
