@extends('manager.layouts.master')
@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to Administrator!</h1>
        <div class="jumbotron">
            {{ Form::open(array('url' => 'manager', 'class'=> 'form-signin')) }}
            @if(count($errors) > 1)
                <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
               <h2 class="form-signin-heading">Please sign in</h2>
               <label for="username" class="sr-only">Email address</label>
               <input type="text" name="username" id="username" class="form-control" placeholder="Username">
               <label for="password" class="sr-only">Password</label>
               <input type="password" name="password" id="password" class="form-control" placeholder="Password">
               <div class="checkbox">
               <label>
               <input type="checkbox" value="remember-me"> Remember me
               </label>
               </div>
               <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              {{ Form::close() }}
        </div>
    </div>
@stop