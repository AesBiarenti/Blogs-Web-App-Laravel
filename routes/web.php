<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//* sayfa ilk açıldığında anasayfada auth kontrolü ve blogların listelenmesi
Route::get('/',[PostController::class , 'indexPost'])->name('blogs');

//* Profil sayfasına gitme
Route::get('/goProfilePage/{id}',[UserController::class,'goProfilePage'])->name('goProfilePage');

//* Blogu Paylaşan profilin detay sayfasına gitme
Route::get('/goProfileDetailPage/{id}',[UserController::class,'goProfileDetailPage'])->name('goProfileDetailPage');

//* blog div'indeki yuvarlak profil arayüzüne basınca bizi o kişinin profiline göndersin
Route::get('/goProfileDetail')->name('goProfileDetail');

//* blog detay sayfasının görüntülenmesi id, user, comment, likes
Route::get('/goBlogDetail/{id}',[UserController::class,'goBlogDetail'])->name('goBlogDetail');

//* blog yaz butonu ile blog ekle sayfasına yönlendirilmesi ve bunu yaparken de auth kontolü yapılması
Route::get('/go-add-post',[PostController::class , 'goAddPost'])->name('goAddPost');

//* Ayrı olarak giriş sayfasına yönlendirme işlemi
Route::get('/goLogin',function(){
    return view('add-blog.auth.login');
})->name('goLogin');

//* Ayrı olarak kayıt sayfasına yönelme işlemi
Route::get('/go-register',function(){
    return view('add-blog.auth.register');
})->name('go-register');

//* giriş yapğmadıysa otomatik olarak register sayfasına yönlendirilmesi 
Route::get('/goRegister', [UserController::class , 'goRegister'])->name('goRegister');

//* Giriş yapma işlemi
Route::post('/login',[UserController::class , 'login'])->name('login');

//* Kayıt olma işlemi
Route::post('/register',[UserController::class , 'register'])->name('register');

//* Çıkış Yapma işlemi
Route::get('/logout',[UserController::class , 'logOut'])->name('logOut');

//* blog ekle post
Route::post('/add-blog/{id}',[PostController::class,'addPost'])->name('addblog');

//* Detay Sayfası içerisinde gönderiye yorum yapma/silme/güncelleme işlemi
//* Detay Sayfası içinde like like'ı geri çekme işlemi