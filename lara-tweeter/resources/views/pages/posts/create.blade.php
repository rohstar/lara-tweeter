@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Post</div>

                    <div class="panel-body">
                        @if (Auth::guest())
                            You Need to Login/Register to post!
                            <li><a href="{{ url('/auth/login') }}">Login</a></li>
                            <li><a href="{{ url('/auth/register') }}">Register</a></li>
                        @else

                            {!! Form::open(['url' => 'post', 'data-toggle' => 'validator']) !!}
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
        </div>
    </div>
@endsection