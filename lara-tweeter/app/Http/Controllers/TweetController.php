<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateTweetRequest;
use App\Tweet;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // take the tweets from the table by descending order of created_at, and then get those vals.

        $tweets = Tweet::latest('created_at')->get();

        return view('pages.posts.show', compact('tweets'));
	}

	public function create()

	{
        return view('pages.posts.create');
	}

    /**
     * @param CreateTweetRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateTweetRequest $request)

    {
        // get the content
        $input = $request->get('content');
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
