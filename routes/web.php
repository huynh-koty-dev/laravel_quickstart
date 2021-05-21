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


Route::view('/addtodos','addTodos');
Route::post('addtodos',[TodosController::class,'addtodos']);
Route::get('/home',[TodosController::class,'index'])->middleware('checkLogout');
Route::get('/login',[UserController::class,'index'])->middleware('checkLogin');
Route::post('login',[UserController::class,'login']);
Route::view('/register','register')->middleware('checkLogin');
Route::post('register',[UserController::class,'register']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('delete/{id}',[TodosController::class,'delete'])->name('delete')->middleware('checkLogout');
Route::get('edit/{id}', [TodosController::class,'showData'])->name('edit')->middleware('checkLogout');
Route::post('edit', [TodosController::class,'edit'])->name('edittodos')->middleware('checkLogout');
Route::get('search',[TodosController::class,'search'])->name('search');
Route::get('profile',[UserController::class,'getProfile']);
Route::post('editProfile',[UserController::class,'editProfile'])->name('editProfile');
Route::view('profileform', 'profileform');