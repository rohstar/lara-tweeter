<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateTweetRequest;
use App\Tweet;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller {


    public function __construct(){

        // uses the Authenticate Middleware to check if
        // the request is from a logged-in user
       $this->middleware('auth');
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
        Auth::user()->tweets()->create($request->all());
        flash()->success('You have shared your profound wisdom with the world!');

        return redirect('/');
	}

	public function show($id)

	{
		$tweet = Tweet::findOrFail($id);
        return view('pages.posts.one_post', compact('tweet'));
	}

}
