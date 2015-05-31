<?php namespace App\Http\Controllers;

use App\Tweet;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Request;

class TweetController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tweets = Tweet::all();

        return view('pages.posts.show', compact('tweets'));

        //return User::find($userId)->posts;
	}

	public function create()

	{
        return view('pages.posts.create');
	}

	public function store()

    {
        // get the content
        $input = Request::get('content');
        // associate the current user to the content
        $user = Auth::id();
        // store the value to the database.
        $thing = Tweet::create(['user_id' => $user, 'content' => $input]);

        return redirect('post');

	}

	public function show($id)

	{
		$tweet = Tweet::findOrFail($id);
        return view('pages.posts.one_post', compact('tweet'));
        //return $tweet;
	}

	public function edit($id)

	{
		//
	}


	public function update($id)

	{
		//
	}

	public function destroy($id)

	{
		//
	}

}
