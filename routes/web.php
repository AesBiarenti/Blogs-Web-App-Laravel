<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blog.blogs');
});
Route::get('/blogs-detail',function(){
    return view('blog.blogs-detail');
})->name('blogs-detail');

Route::get('/add-post',function(){
    return view('add-post.auth.login');
})->name('login');

Route::post('/admin-login',[UserController::class,'login']
)->name('admin-login');

Route::get('add-post/register',function(){
    return view('add-post.auth.register');
})->name('register');

Route::post('/admin-register',[UserController::class,'register']
)->name('admin-register');

Route::get('/profile',function(){
    return view('profie.main');
})->name('profile.main');

Route::post('/add-post',[PostController::class,'addPost'])
->name('addPost');