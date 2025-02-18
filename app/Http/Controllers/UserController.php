<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function goProfilePage($id){
        $user = User::findOrFail($id);
        return view('profie.main',compact('user'));
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=>'required|string|min:6'
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->route('blogs')->with('success','Success Login');
        }
        return back()->with('error','E posta veya Şifre Yanlış');
    }
    public function logOut(){
        Auth::logout();
        return redirect()->route('blogs');
    }
    public function goRegister(){
        return view('add-blog.auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı!',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->route('goLogin')->with('success','kayıt işlemi başarılı');
    }
    public function goBlogDetail($id){
        $blogDetail = Post::findOrFail($id);
        return view('blog.blogs-detail',compact('blogDetail'));
    }
}
