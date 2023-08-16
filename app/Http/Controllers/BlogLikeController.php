<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogLikeController extends Controller
{     
    // public function blogLike(Request $request, Blog $post)
    // {
    //     $userIp = $request->ip();
    
    //     $existingLike = Like::where('blog_post_id', $post->id)
    //                         ->where('user_ip', $userIp)
    //                         ->first();
    
    //     if ($existingLike) {
    //         // User has already liked the post, so we will remove the like
    //         $existingLike->delete();
    
    //         return response()->json(['message' => 'Post unliked!']);
    //     }
    
    //     // User has not liked the post, so we will create a new like
    //     $like = new Like();
    //     $like->blog_post_id = $post->id;
    //     $like->user_ip = $userIp;
    //     $like->save();
    
    //     return response()->json(['message' => 'Post liked!']);
    // } 
    
}
