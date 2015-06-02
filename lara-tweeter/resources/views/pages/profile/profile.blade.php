@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="jumbotron">
                        <h1 class="text-right">{{ $idFriendsFollowersFollowCount[0]->name }}</h1>
                        <!-- MAKE LOGIC TO SHOW FOLLOW BUTTON MAN
                        else
                        if(Auth::user()->follows($idAndFriends[0]->id))
                                    {!! Form::submit('Follow!',['class' => 'btn btn-small']) !!}-->
                        @if(Auth::user()->id != $idFriendsFollowersFollowCount[0]->id)
                                <div class="pull-right">
                                    {!! Form::open(['url' => '/unfriend']) !!}
                                    {!! Form::hidden('hidden',$idFriendsFollowersFollowCount[0]->id) !!}
                                    {!! Form::submit('Unfollow',['class' => 'btn btn-danger']) !!}
                                     {!! Form::close() !!}
                            </div>
                        @endif
                    </div>
 <div class="panel-heading"><h4 class="text-right"><small>Followed by </small>{{$idFriendsFollowersFollowCount[3]}}</h4>Recent Lara-Tweets
                    </div>
                    <div class="panel-body">
                            @include('pages.partials.tweets',['user' => $idFriendsFollowersFollowCount[0]->id])
                        </div><div>
                    </div><hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel-heading"> Follows: </div>
                            <div class="panel-body">
                                @foreach($idFriendsFollowersFollowCount[1] as $friend)
                                     <li class="list-group-item">
                                         {{$friend}}
                                     </li>
                                 @endforeach
                             </div>
                    </div>
                    <div class="col-md-6">
                    <div class="panel-heading">Followers: </div>
                    <div class="panel-body">
                        @foreach($idFriendsFollowersFollowCount[2] as $follower)
                            <li class="list-group-item">
                                {{$follower}}
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
            </div>
                </div>
            </div>
@endsection
