@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($tweet->content != null)
                            <div class="body">{{ $tweet->content }} </div>
                            <div class="text-primary">by {{\App\User::find($tweet->user_id)->name}}</div>
                            <div class="text-primary">posted {{$tweet->created_at->diffForHumans()}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
