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
                        @if(Auth::user()->id != $idAndFriends[0]->id)
                            <div class="pull-right">
                                {!! Form::open(['url' => '/friend']) !!}
                                {!! Form::hidden('hidden',$idAndFriends[0]->id) !!}
                                {!! Form::submit('Follow',['class' => 'btn btn-small']) !!}
                                {!! Form::close() !!}
                            </div>
                                @else
                            <div class="pull-right">
                                Welcome to your profile!
                            </div>

                        @endif
                    </div>
                    <div class="panel-heading">Recent Lara-Tweets</div>
                    <div class="panel-body">
                        @if($idAndFriends[0]->follows(Auth::user(),$idAndFriends[0]->id))
                            @include('pages.partials.tweets',['user' => $idAndFriends[0]->id])
                        @endif
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel-heading">{{ $idAndFriends[0]->name }} follows: </div>
                            <div class="panel-body">
                                @foreach($idAndFriends[1] as $friend)
                                     <li class="list-group-item">
                                         {{$friend}}
                                     </li>
                                 @endforeach
                             </div>
                    </div>
                </div>
            </div>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
