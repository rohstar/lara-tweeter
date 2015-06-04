@extends('app')

@section('content')
    <div class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Feeds:</div>

                <div class="panel-body">
                    @foreach ($tweets as $tweet)

                        <a href="{{url('/tweet', $tweet->id)}}">

                            <div class="body"><h5>{{ $tweet->content }}</h5> </a>
                        posted by {{\App\User::find($tweet->user_id)->name}} ({{$tweet->created_at->diffForHumans()}})</div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection