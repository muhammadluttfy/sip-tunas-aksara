<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        return view('dashboard', [
            'title' => 'Dashboard - Sistem Informasi Manajemen PAUD Tunas Aksara',
            'kb_student' => Student::where('level_id', 1)->count(),
            'tk_student' => Student::where('level_id', 2)->count(),
            'count_teachers' => User::count(),
            'count_graduated' => '200' + Student::where('level_id', 3)->count(),

            // get data student where level_id = 1 to json 
            'kb_student_json' => Student::where('level_id', 1)->get()->toJson(),
            // get data student where level_id = 2 to json
            'tk_student_json' => Student::where('level_id', 2)->get()->toJson(),
        ]);
    }

    public function profiles()
    {
        return "comingsoon!";
        // return view('profile.index', [
        //     'title' => 'Tenaga Pendidik - PAUD Tunas Aksara',
        //     'users' => User::all()
        // ]);
    }
    public function profile(User $user)
    {
        $colors = ['primary', 'success', 'info', 'warning', 'danger'];
        // random colors
        $color = $colors[array_rand($colors)];

        return view('profile.show', [
            'title' => $user->nama_lengkap . ' ' . '(' . $user->username . ')',
            'user' => $user,
            'color' => $color,
        ]);
    }
}
