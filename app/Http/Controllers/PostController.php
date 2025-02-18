<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function indexPost (){
      return view('blog.blogs');  
    }
    public function goAddPost(){
        if (Auth::check()) {
            return view('add-blog.add-blog');
        }
        return view('add-blog.auth.login');
    }
    public function addPost (Request $request , $id){
        $request->validate([
            'title'=>'required|string|min:1',
            'content'=>'required',
            'category_id'=>'required|exists:categories,id'
        ]);
        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'user_id'=>$id
        ]);
        
        return redirect()->route('blogs',compact('id'));
    }
    public function deletePost (Request $request){}
    public function updatePost (Request $request){}
    
}
