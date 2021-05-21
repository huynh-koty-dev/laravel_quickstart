<?php 
    use App\Models\User;
    $users = User::find(session()->get('id'));
?>
@extends('master')
@section('content')
    <div class="container"> 
        <div class="custom-form">
            <div class="form-group">
                <div class="form-controll">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" colspan="2"><h4>Cài đặt tài khoản chung</h4></th> 
                          </tr>
                        </thead>
                        <form action="editProfile" method="POST">
                            @csrf
                        <tbody>
                          <tr>
                            <input type="hidden" name="id" value="{{$users->id}}">
                            <th scope="row">Tên</th>
                            <td><input type="text" name="name" value="{{$users->name}}"></td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td><input type="text" readonly  name="email" value="{{$users->email}}"></td>
                          </tr>
                        </tbody>
                        <tr>
                            <th></th>
                            <td style="text-align: right"><button type="submit" class="btn btn-success">Lưu</button></td>
                        </tr>
                        </form>
                      </table>
                      
                </div>
            </div>
        </div>
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