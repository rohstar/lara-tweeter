@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="jumbotron">
                        <h1>{{ $idAndFriends[0]->name }}'s profile.</h1>
                        <!-- MAKE LOGIC TO SHOW FOLLOW BUTTON MAN
                        else
                        if(Auth::user()->follows($idAndFriends[0]->id))
                                    {!! Form::submit('Follow!',['class' => 'btn btn-small']) !!}-->
                            <div class="pull-right">
                                {!! Form::open(['url' => '/friend']) !!}
                                {!! Form::hidden('hidden',$idAndFriends[0]->id) !!}
                                {!! Form::submit('Follow',['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                    </div>
                    <div class="panel-heading">Recent Lara-Tweets</div>
                    <div class="panel-body">
                        Must Follow to see lara-tweets
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
