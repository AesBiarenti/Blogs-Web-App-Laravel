<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=>'required|string|min:6'
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            return view('add-post.add-post')->with('success','Success Login');
        }
        return back()->with('error','E posta veya Şifre Yanlış');
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
        return redirect()->route('login')->with('success','kayıt işlemi başarılı');
    }
}
