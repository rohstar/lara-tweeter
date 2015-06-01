@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="jumbotron">
                        <h1>{{ $user->name }}'s profile.</h1>
                        @if(Auth::user()->id  != $user->id)
                        <div class="pull-right">
                            <input type="submit" class="btn btn-small" value="Follow"/>
                        </div>
                        @endif
                    </div>
                    <div class="panel-heading">Recent Lara-Tweets</div>
                    <div class="panel-body">
                        @if($user->follows(Auth::user(),$user->id))
                            @include('pages.partials.tweets',['user' => $user->id])
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
