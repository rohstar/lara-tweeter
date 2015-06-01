@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Lara-Feed</div>

                    <div class="panel-body">
                        Welcome Home, {{ Auth::user()->name }}!

                        <div class ="content">
                            <ul class="list-group">
                                @foreach ($tweets as $tweet)

                                    <a href="{{url('/tweet', $tweet->id)}}">

                                        <div class="body"><h5>{{ $tweet->content }}</h5> </a>
                                    posted by {{\App\User::find($tweet->user_id)->name}} ({{$tweet->created_at}})</div>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
