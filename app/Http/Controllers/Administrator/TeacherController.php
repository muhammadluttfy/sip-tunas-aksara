<?php

namespace App\Http\Controllers\Administrator;

use App\Models\User;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.teacher.index', [
            'title' => 'Tenaga Pendidik - PAUD Tunas Aksara',
            // get all data student by level_id = 1
            'teachers' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.teacher.create', [
            'title' => 'Tambah Tenaga Pendidik - PAUD Tunas Aksara',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            // validasi user / teacher            
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:255|unique:users',
            'no_identitas' => [],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => ['required', 'email:dns', 'max:255', 'unique:users'],
            'jabatan' => [],
            // 'password' => ['required', 'min:5', 'max:255', 'string'],

            // // validasi social media
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
        ]);

        // create data socialMedia
        $socialMedia = new SocialMedia;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->facebook = $request->facebook;
        $socialMedia->whatsapp = $request->whatsapp;
        $socialMedia->save();


        // create data user / teacher
        $user = User::create([
            'social_media_id' => $socialMedia->id,
            'nama_lengkap' => $request->nama_lengkap,
            'no_identitas' => str_pad(User::orderBy('created_at', 'DESC')->first()->id + 1, 3, "0", STR_PAD_LEFT) . '/paud/' . date('Y'),
            'username' => $request->username,
            'avatar' => $request->file('avatar')->store('avatars'),
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'role' => $request->jabatan,
            'password' => Hash::make($request->tanggal_lahir),
        ]);


        event(new Registered($user));

        return redirect()->route('teacher.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('administrator.teacher.show', [
            'title' => $user->nama_lengkap . ' ' . '(' . $user->username . ')',
            'teacher' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('administrator.teacher.edit', [
            'title' => 'Edit Tenaga Pendidik - PAUD Tunas Aksara',
            'teacher' => User::findOrFail($id),
            'socialMedia' => SocialMedia::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            // validasi user / teacher            
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'no_identitas' => [],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => ['required', 'email:dns', 'max:255', 'unique:users,email,' . $id],
            'jabatan' => [],
            // 'password' => ['required', 'min:5', 'max:255', 'string'],

            // social media validation
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
        ]);

        // update data socialMedia
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->instagram = $request->instagram;
        $socialMedia->facebook = $request->facebook;
        $socialMedia->whatsapp = $request->whatsapp;
        $socialMedia->save();

        // update data user / teacher
        $user = User::findOrFail($id);
        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->role = $request->jabatan;
        if ($request->oldAvatar) {
            Storage::delete($request->oldAvatar);
        }
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars');
        }
        $user->save();

        return redirect()->route('teacher.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $data = User::find($id);

        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $data->delete();
        return redirect()->route('teacher.index')->with('success', 'Data tenaga pendidik berhasil dihapus!');
    }
}
