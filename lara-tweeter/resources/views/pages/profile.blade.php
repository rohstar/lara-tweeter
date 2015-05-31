@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="jumbotron">
                        <h1>{{ $user->name }}'s profile.</h1>
                    </div>
                    <div class="panel-heading">Recent Lara-Tweets</div>
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach ($tweets as $tweet)


    <li class="list-group-item"> {{ $tweet->content }} ...

                                <span class="badge">posted ({{$tweet->created_at->diffForHumans()}})</span>
    </li>
                    @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
