<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blog.blogs');
});


Route::get('/login',function(){
    return view('add-post.auth.login');
})->name('login');

Route::post('/admin-login',[UserController::class,'login']
)->name('admin-login');

Route::get('add-post/register',function(){
    return view('add-post.auth.register');
})->name('register');

Route::post('/admin-register',[UserController::class,'register']
)->name('admin-register');



Route::post('/add-post/{id}',[PostController::class,'addPost'])
->name('addPost');

//* İd ye göre blog detay sayfasına yönlenme
Route::get('/blog-detail/{id}', function ($id) {
    $blog = App\Models\Post::findOrFail($id);
    return view('blog.blogs-detail', compact('blog'));
})->name('blog-detail');

Route::get('/profile/{id}',function($id){
    $user = User::with('posts')->findOrFail($id);
    return view('profie.main',compact('user'));
})->name('profile.main');;