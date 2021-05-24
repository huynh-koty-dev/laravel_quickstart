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
        dd('sadfsadf');
        $req->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        if(strpos($req->title,'<')!==false){
            return view('addTodos',['error'=>'Title not match!']);
        }
        $data = new Todo;
        $data->title = $req->title;
        $data->content = $req->content;
        $data->user_id = $req->userId;
        $data->status = $req->status;
        $data->save();
        return  redirect('home');
    }
    public function delete($id)
    {
        Todo::destroy($id);
        return  redirect('home');
    }
    public function showData($id)
    {
        $data = Todo::find($id);
        return view('edit',['data'=>$data]);
    }
    public function edit(Request $req)
    {
        $req->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $data = Todo::find($req->id);
        $data->title = $req->title;
        $data->content = $req->content;
        $data->user_id = $req->userId;
        $data->status = $req->status;
        $data->save();
        return  redirect('home');
    }
    public function search(Request $req)
    {
        $userId = $req->user_id;
        $search = $req->search;
        $data = Todo::where('title','LIKE','%'.$search.'%')
        ->where('user_id',$userId)
        ->get();
        return view('search',['data'=>$data]);
    }
}
