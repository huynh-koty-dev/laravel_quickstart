<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[TodosController::class,'index'])->middleware('checkLogout');
Route::get('/login',[UserController::class,'index'])->middleware('checkLogin');
Route::post('login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);