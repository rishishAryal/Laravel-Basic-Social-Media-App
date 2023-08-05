<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->middleware('auth');
Route::get('/login',[SessionController::class,'create'])->name('login')->middleware('guest');
Route::post('/login',[SessionController::class,'store'])->middleware('guest');
Route::get('/logout',[SessionController::class,'destroy'])->middleware('auth');
Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
Route::get('/posts/create',[PostController::class,'create'])->middleware('auth');
Route::post('/posts/create',[PostController::class,'store'])->middleware('auth');
Route::delete('posts/{post_id}/delete',[PostController::class,'destroy'])->middleware('auth');
Route::delete('profile/posts/{post_id}/delete',[UserController::class,'destroy'])->middleware('auth');

Route::get('/profile/{id}',[UserController::class,'show'])->middleware('auth');
Route::get('/profile/{id}/edit',[UserController::class,'edit'])->middleware('auth');
Route::patch('profile/{id}/edit',[UserController::class,'put'])->middleware('auth');
