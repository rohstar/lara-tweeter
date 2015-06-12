@extends('app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading"><h2>All Users on Lara-tweeter</h2></div>

                    <div class="panel-body">
                        @foreach ($users as $user)
                                <div class="body">
                                    <a href="{{url('/user', $user->id)}}">  <h3>{{ $user->name }}</h3> </a>
                                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection