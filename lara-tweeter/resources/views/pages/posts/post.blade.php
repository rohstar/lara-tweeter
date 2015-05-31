@extends('app')

@section('content')

    @if (Auth::guest())
        You Need to Login/Register to post!
        <li><a href="{{ url('/auth/login') }}">Login</a></li>
        <li><a href="{{ url('/auth/register') }}">Register</a></li>
    @else
        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Would you like to Lara-tweet?</legend>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textarea"></label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="textarea" name="textarea">What's Cookin'?</textarea>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Post!</button>
                    </div>
                </div>

            </fieldset>
        </form>
    @endif

@stop