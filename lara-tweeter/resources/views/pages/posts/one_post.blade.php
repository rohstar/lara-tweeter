@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($tweet->content != null)
                            <div class="body">

                                <div class="page-header">
                                    <h1> {{ $tweet->content }} <small>by

                                            @if(Auth::user()->id == $tweet->user_id)
                                                you
                                            @else
                                                {{\App\User::find($tweet->user_id)->name}}
                                    @endif
                                    </div>
                                            <div class="text-primary">posted {{$tweet->created_at->diffForHumans()}}</div>
                                        </small></h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
