@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')

	<form class="form-signin" action="{{ URL::to('users/login') }}" method="post">  

        <h2 class="form-signin-heading">Login</h2> 
        {{ Form::token(); }}

        {{ ($errors->has('email') ? $errors->first('email') : '') }}
        {{ ($errors->has('password') ?  $errors->first('password') : '') }}

        <input name="email" id="email" value="{{ Request::old('email') }}" type="text"  class="form-control" placeholder="E-mail">
    
        <input name="password" value="" type="password" class="form-control" placeholder="Password">
                
        <label class="checkbox">
            <input type="checkbox" name="rememberMe" value="1"> Remember Me
        </label>

        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Log In"/>
        <a href="{{ URL::to('users/resetpassword') }}" class="btn btn-link">Forgot Password?</a>
       
  </form>


@stop