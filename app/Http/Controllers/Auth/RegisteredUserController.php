<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'no_identitas' => [],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'jabatan' => [],
            'password' => ['required', 'min:5', 'max:255', 'string'],
        ]);

        $socialMedia = new SocialMedia;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->facebook = $request->facebook;
        $socialMedia->whatsapp = $request->whatsapp;
        $socialMedia->save();

        $user = User::create([
            'social_media_id' => $socialMedia->id,
            'nama_lengkap' => $request->nama_lengkap,
            'no_identitas' => '18083000001',
            'email' => $request->email,
            'role' => $request->jabatan,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
