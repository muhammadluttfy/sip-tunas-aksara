<?php

namespace App\Http\Controllers\Auth;

use App\Models\Raport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Clockwork\Request\RequestType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Dotenv\Exception\ValidationException;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        $colors = ['primary', 'success', 'info', 'warning', 'danger'];
        $color = $colors[array_rand($colors)];

        global $semester, $level;

        if (Str::length(Auth::guard('student')->user()) > 0) {
            $semester = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->semester_id;
            $level = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->level_id;
        }


        return view('student.setting.index', [
            'title' => 'Ubah password | ' . Auth()->user()->nama_lengkap,
            'user' => Auth::user(),
            'color' => $color,
            'semester' => $semester,
            'level' => $level,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:7|confirmed',
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update([
                'password' => Hash::make($request->password),
            ]);

            // logout when success
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password berhasil diubah, silahkan login kembali');

            // return back()->with('success', 'Password berhasil dirubah');
        } else {
            return back()->with('error', 'Password lama tidak sesuai');
        }
    }
}
