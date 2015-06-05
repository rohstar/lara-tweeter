@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-md-10 col-md-offset-1">


                <div class="panel panel-default">
                    <div class="panel-heading">Quick Lara-Tweet</div>

                    <div class="panel-body">
                        @if (Auth::guest())
                            You Need to Login/Register to post!
                            <li><a href="{{ url('/auth/login') }}">Login</a></li>
                            <li><a href="{{ url('/auth/register') }}">Register</a></li>
                        @else
                            {!! Form::open(['url' => 'tweet', 'data-toggle' => 'validator']) !!}
                            <div class="form-group">
                                {!! Form::text('content',null,[ 'class' => 'form-control', 'maxlength' => '200']) !!}
                                <span class="help-block">Max 200 Characters</span>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Lara-Tweet!',null,[ 'class' => 'btn btn-primary form-control']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </div>
                    @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <li>{{$error}}</li>
                                </div>
                            @endforeach
                        </ul>
                    @endif</div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-md-offset-1 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Lara-Feed</div>
                        <div class="panel-body">
                            <div class ="content">
                                <ul class="list-group">
                                                @foreach ($tweets as $tweet)
                            </li> <h4 class="list-group-item-heading"><a href="{{url('/tweet', $tweet->id)}}">{{ $tweet->content }} </a></h4>
                                        <p class="list-group-item-text text-right">posted by
                                                @if(Auth::user()->id == $tweet->user_id)
                                                    you
                                                @else
                                                  {{  App\User::find($tweet->user_id)->name }}
                                                @endif
                                                <span class="badge">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$tweet->created_at)->diffForHumans()}}</span></p><hr>
                                            @endforeach
                                 </ul>
                            </div>
                        </div>
        </div>
    </div>
        </div>
@endsection


