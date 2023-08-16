<?php

namespace App\Http\Controllers;
use Faker\Factory as Faker;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    // public function indexComment()
    // {
    //     $pendingComment = Comment::where('approved', false)->get();
    //     $pendingCommentCount = Comment::where('approved', false)->count();
    //     $approvedCommentCount = Comment::where('approved', true)->count();
    //     $approvedComment = Comment::where('approved', true)->get();
    //     $blogData = Blog::select(['id','blog_title','blog_img'])->get();
    //     return view('admin.comment-approval', compact('pendingComment','pendingCommentCount','approvedComment','approvedCommentCount','blogData'));
    // }

    // public function updateComment(Request $request, Comment $comment)
    // {
    //     $comment->approved = $request->has('approve');
    //     $comment->save();

    //     return redirect('/admin/comment-approval')->with('success', 'Comment status updated.');
    // }
    
    // public function storeBlogComment(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'blog_post_id' => 'required|exists:blogs,id',
    //         'content' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     $comment = new Comment();
    //     $comment->blog_post_id = $request->blog_post_id;
    //     $comment->content = $request->content;
    //     $comment->name = $request->name ?? $this->generateAnonymousName();
    //     $comment->save();

    //     return redirect()->back()->with('success', 'Comment submitted and pending admin approval.');
    // }

    // private function generateAnonymousName()
    // {
    //     // Use Laravel's Faker library to generate random names
    //     $faker = \Faker\Factory::create();
    //     return $faker->name;
    // }

//     private function generateAnonymousName()
// {
//     $faker = \Faker\Factory::create();

//     $name = $faker->name; // Generate a random name

//     // Convert the name to asterisked format
//     $asteriskedName = '';
//     $nameParts = explode(' ', $name); // Split the name into parts
//     foreach ($nameParts as $part) {
//         $firstChar = substr($part, 0, 1); // Get the first character
//         $asteriskedName .= $firstChar . str_repeat('*', strlen($part) - 1) . ' '; // Replace the remaining characters with asterisks
//     }

//     return trim($asteriskedName);
// }
}
