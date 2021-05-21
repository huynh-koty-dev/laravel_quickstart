@extends('master')
@section('content')
<form class="custom-form" action="login" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">  
        @error('email')
        <div class="alert alert-danger " role="alert">{{$message}}</div>
        @enderror
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="password" value="{{old('password')}}" id="exampleInputPassword1" placeholder="Password">
      @error('password')
      <div class="alert alert-danger " role="alert">{{$message}}</div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Login</button>
    @if ($error ?? null)
    <div class="alert alert-danger " role="alert">{{$error}}</div>
    @endif
  </form>

  <style>
      .custom-form{
          width: 400px;
          position: absolute;
          left: 50%;
          top:40%;
          transform: translate(-50%,-50%);
      }
  </style>
@endsection