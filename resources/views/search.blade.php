@extends('master')
@section('content')
    <div class="container"> 
        <div class="custom">
            <a href="addtodos" class="btn btn-success"><i class="fas fa-edit"></i> Thêm ghi chú</a>
        </div>
        <table class="table">
            <thead>
              <tr style="text-align: center">
                <th scope="col"></th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Operation</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr  style="text-align: center">        
                    <th scope="row">+</th>                   
                    <td>
                        <div class="card">
                        <div class="card-header" id="heading{{$item->id}}">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                {{$item->title}}
                            </button>
                               
                          </h5>
                        </div>
                        
                        <div id="collapse{{$item->id}}" class="collapse hidden" aria-labelledby="heading{{$item->id}}" data-parent="#accordion">
                          <div class="card-body">
                            {{$item->content}}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>{{$item->status}}</td>
                    <td><a onclick="return confirm('Are you sure about that!')" href="delete/{{$item->id}}"><i class="fas fa-trash"></i></a> | <a href="edit/{{$item->id}}"><i class="fas fa-edit"></i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <style> 
        .custom{
          margin-top:20px;
          margin-bottom: 20px;
          position: relative;
          left: 80%;
          
          
        }
    </style>
@endsection