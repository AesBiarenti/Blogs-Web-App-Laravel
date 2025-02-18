<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function indexComment(){
        $userId = Auth::id();
        $comments = Comment::where('user_id',$userId);
        return $comments;
    }
    public function addComment(Request $request){
        $request->validate([
            'content'=>'required|string|min:1',
            'post_id'=>'required|exists:posts,id',
        ]);
        if (Auth::check()) {
            Comment::create([
                'content'=>$request->content,
                'post_id'=>$request->post_id,
                'user_id'=>Auth::id(),
            ]);
            return redirect()->back()->with('success', 'Yorum başarıyla eklendi!');
        }
        return redirect()->route('goLogin')->with('error', 'Önce giriş yapmalısınız.');
     
    }
    public function deleteComment(Request $request){}
    public function updateComment(Request $request){}
}
