<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Session;
use Auth;
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
        if(!Auth::attempt(['email' => $req->email, 'password' => $req->password])){
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
    public function register(Request $req){
        $req->validate([
            '_name'=>'required',
            '_email'=>'required|email',
            '_password'=>'required|max:30'
        ]);
        if(strpos($req->_name,'<')!==false){
            return view('register',['error'=>'Name not match!']);
        }
        $user = DB::select( DB::raw("SELECT * FROM users WHERE email = :email"),array(
            'email'=>$req->_email
        ));
        //$user = User::where('email','=',$req->_email)->first();
        if($user){
            return view('register',['error'=>'Email already exist!']);
        }else{
            $data = new User;
            $data->name=$req->_name;
            $data->email=$req->_email;
            $data->password=Hash::make($req->_password);
            $data->save();
            return redirect('login');
        }
    }
    public function getProfile(){
        $id = Session::get('id');
        $user = User::find($id);
        return view('profile',['users'=>$user]);
    }
    public function editProfile(Request $req){
        $user = User::findOrFail($req->id);
        $user->name = $req->name;
        $user->save();
        $req->session()->put('user',$user->name);
        return redirect('profile');
    }
}
