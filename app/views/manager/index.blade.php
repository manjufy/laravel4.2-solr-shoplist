@extends('manager.layouts.master')
@section('content')
    <div class="container">
    <h1 class="text-center">Welcome to Administrator!</h1>
    <div class="jumbotron">
      <form class="form-signin">
              <h2 class="form-signin-heading">Please sign in</h2>
              <label for="inputUsername" class="sr-only">Email address</label>
              <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
    </div>
    </div>
@stop