<?php

namespace App\Http\Controllers\Student;

use App\Models\Post;
use App\Models\Raport;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\User;

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

    // create function for show data raport student login
    public function showNilaiRaport()
    {
        return view('student.raport.index', [
            'title' => 'Nilai Raport',
            'student' => auth()->guard('student')->user(),
            'raport_1' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 1)->first(),
            'raport_2' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 2)->first(),
            'raport_3' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 3)->first(),
            'raport_4' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 4)->first(),
            'raport_5' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 5)->first(),
            'raport_6' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 6)->first(),
            'raport_7' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 7)->first(),
            'raport_8' => Raport::where('student_id', auth()->guard('student')->user()->id)->where('semester_id', 8)->first(),
            'years' => range(date('Y') - 2, date('Y')),
        ]);
    }

    public function showProfile()
    {
        // if guard student is login
        if (auth()->guard('student')->check()) {
            return view('profile.profile-student', [
                'title' => 'Profile',
                'student' => auth()->guard('student')->user(),
            ]);
        } else {
            return view('profile.profile-teacher', [
                'title' => 'Profile',
                // get data guard user
                'teacher' => auth()->guard('user')->user(),
            ]);
        }
    }
}
