<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function indexPost (Request $request){}
    public function addPost (Request $request){
        $request->validate([
            'title'=>'required|string|min:1',
            'content'=>'required',
            'category_id'=>'required|exists:categories,id'
        ]);
        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::id()
        ]);
        return redirect()->route('profile.main');
    }
    public function deletePost (Request $request){}
    public function updatePost (Request $request){}
    
}
