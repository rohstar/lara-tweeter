@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="panel panel-default">
                             <div class="panel-heading">Your Lara-Feed</div>
                                <div class="panel-body">
                                    <div class ="content">
                                        <ul class="list-group">
                                            @foreach ($tweets as $tweet)

                                                <div class="body"><h5><a href="{{url('/tweet', $tweet->id)}}">{{ $tweet->content }} </a></h5>
                                                posted by
                                                @if(Auth::user()->id == $tweet->user_id)
                                                    you
                                                @else
                                                  {{  App\User::find($tweet->user_id)->name }}
                                                @endif
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$tweet->created_at)->diffForHumans()}}</div>
                                    @endforeach
                                        </ul>
                                </div>
            </div>
        </div>
    </div>
        <div class="col-xs-6 col-md-4">
            <blockquote class="blockquote-reverse">
                {{ Auth::user()->name }}
                <h5>Welcome Home</h5>
            </blockquote>
        </div>
@endsection


