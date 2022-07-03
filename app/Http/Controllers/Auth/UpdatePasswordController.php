<?php

namespace App\Http\Controllers\Auth;

use App\Models\Raport;
use Illuminate\Http\Request;
use Clockwork\Request\RequestType;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        $colors = ['primary', 'success', 'info', 'warning', 'danger'];
        // random colors
        $color = $colors[array_rand($colors)];
        return view('student.setting.index', [
            'title' => 'Pengaturan | ' . auth()->guard('student')->user()->nama_lengkap,
            'student' => auth()->guard('student')->user(),
            'color' => $color,
            'semester' => Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->semester_id,
            'level' => Raport::where('student_id', auth()->guard('student')->user()->id)->latest()->first()->level_id,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:7|confirmed',
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            // update password
            auth()->user()->update([
                'password' => Hash::make($request->password),
            ]);
            return back()->with('success', 'Password berhasil dirubah');
        } else {
            return back()->with('error', 'Password lama tidak sesuai');
        }
    }
}
