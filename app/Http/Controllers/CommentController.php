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
            'content'=>'required|string',
            'post_id'=>'required|string',
            'user_id'=>Auth::id()
        ]);
        Comment::create([
            'content'=>$request->content,
            'post_id'=>$request->post_id,
            'user_id'=>$request->user_id
        ]);
    }
    public function deleteComment(Request $request){}
    public function updateComment(Request $request){}
}
