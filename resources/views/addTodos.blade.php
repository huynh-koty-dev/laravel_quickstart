@extends('master')
@section('content')
    <div class="container"> 
        <form class="custom-form" method="POST" action="addtodos">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" placeholder="Enter title">
              @error('title')
              <div class="alert alert-danger " role="alert">{{$message}}</div>
              @enderror
            
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" class="form-control" id="content" value="{{old('content')}}" cols="30" rows="10"></textarea>
              @error('content')
              <div class="alert alert-danger " role="alert">{{$message}}</div>
              @enderror
            
            </div>
            
            <div class="form-group">  
                <input type="hidden" class="form-control" name="userId" value="{{session()->get('id')}}">
              </div>
              <div class="form-group">
                
                <input type="hidden" class="form-control" name="status"  value="Chưa hoàn thành">
              </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
    </div>
    <style>
        .custom-form{
            width: 600px;
            position: absolute;
            top:20%;
            left:50%;
            transform: translate(-50%);
        }    
    </style>         
@endsection