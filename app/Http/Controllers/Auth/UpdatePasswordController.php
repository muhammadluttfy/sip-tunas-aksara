<?php

namespace App\Http\Controllers\Auth;

use App\Models\Raport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        $raport_1 = Raport::where('student_id', Auth::user()->id)->where('semester_id', 1)->first();
        if ($raport_1 != null) {
            $semester = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->semester_id;
            $level = Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->level_id;
        } else {
            $semester = 1;
            $level = null;
        }


        return view('student.settings.update-password', [
            'title' => 'Ubah password | ' . Auth()->user()->nama_lengkap,
            'user' => Auth::user(),
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
