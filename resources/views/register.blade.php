@extends('master')
@section('content')
<form class="custom-form" action="register" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="_name" value="{{old('_name')}}"  placeholder="Enter Name">  
          @error('_name')
          <div class="alert alert-danger " role="alert">{{$message}}</div>
          @enderror
        
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="_email" value="{{old('_email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">  
        @error('_email')
        <div class="alert alert-danger " role="alert">{{$message}}</div>
        @enderror
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="_password" value="{{old('_password')}}" id="exampleInputPassword1" placeholder="Password">
      @error('_password')
      <div class="alert alert-danger " role="alert">{{$message}}</div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Register</button>
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