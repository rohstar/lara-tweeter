@extends('app')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Follow's</div>
                    {{$follows}}
                    <div class="panel-body">
                        @foreach ($friends as $user)

                            <a href="{{url('/user', $user->id)}}">{{$user->name}}</a>
                    @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop