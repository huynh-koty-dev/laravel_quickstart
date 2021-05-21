<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;
class TodosController extends Controller
{
    //
    public function index(){
        $userId = Session::get('id');
        $todos = Todo::all()->where('user_id',$userId);
        return view('home',['todos'=>$todos]);
    }
    public function addtodos(Request $req)
    {
        $req->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $data = new Todo;
        $data->title = $req->title;
        $data->content = $req->content;
        $data->user_id = $req->userId;
        $data->status = $req->status;
        $data->save();
        return  redirect('home');
    }
}
