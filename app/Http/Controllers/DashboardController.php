<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'Dashboard - Sistem Informasi Manajemen PAUD Tunas Aksara',
            'kb_student' => Student::where('level_id', 1)->count(),
            'tk_student' => Student::where('level_id', 2)->count(),
            'count_teachers' => User::count(),
            'count_graduated' => '200' + Student::where('level_id', 3)->count(),
        ]);
    }
}
