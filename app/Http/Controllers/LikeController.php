<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function getLikeIndex($postId){
        $blogDetail = Post::with('likes', 'comments')->findOrFail($postId);
        $isLiked = Like::where('user_id', Auth::id())->where('post_id', $postId)->exists();
    
        return view('blog.blogs-detail', compact('blogDetail', 'isLiked'));
    }
    public function getLike(Request $request){
     if (Auth::check()) {
        $request->validate([
            'post_id'=>'required|exists:posts,id',
        ]);
        $like = Like::where('user_id',Auth::id())->where('post_id',$request->post_id)->first();
        if ($like) {
            $like->delete();
            return redirect()->back()->with('success','beğenme silme  başarılı');
        }
        else {
            Like::create([
                'user_id'=>Auth::id(),
                'post_id'=>$request->post_id
            ]);
            return redirect()->back()->with('success','beğenme işlemi başarılı');
        }
   
     }
     return redirect()->route('goLogin')->with('error', 'Önce giriş yapmalısınız.');
    }
}
