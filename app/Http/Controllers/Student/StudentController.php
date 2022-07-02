<?php

namespace App\Http\Controllers\Student;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    public function index()
    {
        return view('student.forum.index', [
            'title' => 'Forum PAUD',
            'student' => auth()->guard('student')->user(),
            // 'posts' => Post::all(),
            "posts" => Post::latest()->paginate(9)->withQueryString()
        ]);
    }


    public function show(Post $post)
    {
        return view('student.forum.show', [
            'title' => 'Detail Postingan',
            'post' => $post,
            'comments' => Comment::latest()->where('post_id', $post->id)->get(),
            'count_comments' => Comment::where('post_id', $post->id)->count(),
        ]);
    }
}
