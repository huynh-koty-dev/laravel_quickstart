<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function login(Request $req){
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|max:30'
        ]);
        $user = User::where('email','=',$req->email)->first();
        if(!$user || Hash::check($user->password, $req->password)){
            return view('login',['error'=>'Email or Password not matches!']);
        }
        else{
            $req->session()->put('user',$user->name);
            $req->session()->put('id',$user->id);
            return redirect('home');
        }
    }
    public function logout(Request $req){
        $req->session()->pull('user');
        $req->session()->pull('id');
        return redirect('login');
    }
}