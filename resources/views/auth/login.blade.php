@extends('auth.layout')

@section('title', 'Login')

@section('content')

  @if (session()->has('error'))
      <p class="text-danger">{{ session('error') }}</p>
  @endif

  <form class="login-form" method="POST">
    @csrf
    <h2 class="text-center mb-4">Login</h2>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Login</button>
    <div class="text-center mt-3">
        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
      </div>
  </form>
@endsection
