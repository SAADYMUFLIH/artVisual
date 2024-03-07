@extends('auth.layout')

@section('title', 'Register')

@section('content')
<form class="registration-form" action="" method="POST">
  @csrf
    <h2 class="text-center mb-4">Register</h2>
    <div class="form-group">
      <label for="exampleInputName">Username</label>
      <input type="text" class="form-control" id="exampleInputName" name="username" placeholder="Enter your username">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputName">Nama Lengkap</label>
        <input type="text" class="form-control" id="exampleInputName" name="nama_lengkap" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="exampleInputName">Alamat</label>
        <input type="text" class="form-control" id="exampleInputName" name="alamat" placeholder="Enter your addres">
    </div>
   
    <button type="submit" class="btn btn-primary btn-block">Register</button>

    <div class="text-center mt-3">
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
      </div>
  </form>
@endsection
