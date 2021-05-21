@extends('master')
@section('content')
    <div class="container"> 
        <form class="custom-form" method="POST" action="{{route('edittodos')}}">
            @csrf
            <input type="hidden"  name="id" value="{{$data->id}}">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{$data->title}}" placeholder="Enter title">
              @error('title')
              <div class="alert alert-danger " role="alert">{{$message}}</div>
              @enderror
            
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{$data->content}}</textarea>
              @error('content')
              <div class="alert alert-danger " role="alert">{{$message}}</div>
              @enderror
            
            </div>
            
            <div class="form-group">  
                <input type="hidden" class="form-control" name="userId" value="{{$data->user_id}}">
              </div>
              <div class="form-group">
                <select name="status"  >
                    <option value="{{$data->status}}">{{$data->status}}</option>
                    <option value="Chưa hoàn thành">Chưa hoàn thành</option>
                    <option value="Đang hoàn thành">Đang hoàn thành</option>
                    <option value="Đã hoàn thành">Đã hoàn thành</option>
                </select>
                
              </div>
            <button onclick="return confirm('Are you sure about that!')" type="submit" class="btn btn-primary">Update</button>
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