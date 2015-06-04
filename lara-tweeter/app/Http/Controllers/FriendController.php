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
	 * Store a new follow relation in storage.
	 *
	 * @return Response
	 */
	public function store(AddFriendRequest $request)
	{
        Auth::user()->addFriend($request->get('hidden'));
        $redirect_url = $request->get('hidden');
        Flash::success('Followed!');
        return redirect(url('user', $redirect_url));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param AddFriendRequest $request
     * @return Response
     * @internal param int $id
     */
	public function destroy(AddFriendRequest $request)
	{
        Auth::user()->removeFriend($request->get('hidden'));
        $redirect_url = $request->get('hidden');
        Flash::success('Unfollowed!');
        return redirect(url('user', $redirect_url));
	}

}
