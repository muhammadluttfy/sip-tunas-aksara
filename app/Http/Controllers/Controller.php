<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Raport;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function dashboard()
    {
        $raport_1 = Raport::where('student_id', Auth::user()->id)->where('semester_id', 1)->first();
        if ($raport_1 != null) {
            $semester = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->semester_id;
            $level = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->level_id;
            $tahun_masuk = substr(Auth::user()->student_detail->tanggal_masuk, 0, 4);
        } else {
            $semester = 1;
            $level = null;
            if (Auth::user()->role == 'Student') {
                $tahun_masuk = substr(Auth::user()->student_detail->tanggal_masuk, 0, 4);
            } else {
                $tahun_masuk = null;
            }
        }

        return view('dashboard', [
            'title' => 'Dashboard - Sistem Informasi Manajemen PAUD Tunas Aksara',
            'kb_student' => Student::where('level_id', 1)->count(),
            'tk_student' => Student::where('level_id', 2)->count(),
            'count_teachers' => User::count(),
            'count_graduated' => '200' + Student::where('level_id', 3)->count(),
            'user' => Auth::user(),

            'semester' => $semester,
            'level' => $level,
            'tahun_masuk' => $tahun_masuk,
            'tahun_lulus' => $tahun_masuk + 4,
        ]);
    }



    public function dashboardAdmin()
    {
        return view('administrator.dashboardAdmin', [
            'title' => 'Dashboard - Sistem Informasi Manajemen PAUD Tunas Aksara',
            'kb_student' => Student::where('level_id', 1)->count(),
            'tk_student' => Student::where('level_id', 2)->count(),
            'count_teachers' => User::count(),
            'count_graduated' => '200' + Student::where('level_id', 3)->count(),
            'user' => Auth::user(),
        ]);
    }

    public function dashboardStudent()
    {
        $raport_1 = Raport::where('student_id', Auth::user()->id)->where('semester_id', 1)->first();
        if ($raport_1 != null) {
            $semester = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->semester_id;
            $level = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->level_id;
            $tahun_masuk = substr(Auth::user()->student_detail->tanggal_masuk, 0, 4);
        } else {
            $semester = 1;
            $level = null;
            $tahun_masuk = substr(Auth::user()->student_detail->tanggal_masuk, 0, 4);
        }

        return view('student.dashboarStudent', [
            'title' => 'Dashboard - Sistem Informasi Manajemen PAUD Tunas Aksara',
            'kb_student' => Student::where('level_id', 1)->count(),
            'tk_student' => Student::where('level_id', 2)->count(),
            'count_teachers' => User::count(),
            'count_graduated' => '200' + Student::where('level_id', 3)->count(),
            'user' => Auth::user(),

            'semester' => $semester,
            'level' => $level,
            'tahun_masuk' => $tahun_masuk,
            'tahun_lulus' => $tahun_masuk + 4,
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
