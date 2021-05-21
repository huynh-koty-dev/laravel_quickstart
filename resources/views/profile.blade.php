
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
                        <tbody>
                          <tr>
                            <th scope="row">Tên</th>
                            <td>{{$users->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td>{{$users->email}}</td>
                          </tr>
                        </tbody>
                        <tr>
                            <th></th>
                            <td style="text-align: right"><a href="profileform" class="btn btn-warning">Chỉnh sửa</a></td>
                        </tr>
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