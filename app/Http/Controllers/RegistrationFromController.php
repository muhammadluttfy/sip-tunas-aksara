<?php

namespace App\Http\Controllers;

use App\Models\Father;
use App\Models\Mother;
use App\Models\Student;
use App\Models\Mutation;
use App\Mail\EmailRegister;
use App\Models\PaudProgram;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class RegistrationFromController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form-registration.index', [
            'title' => 'Pendaftaran PAUD Tunas Aksara - Program PAUD Tunas Aksara',
            'subtitle' => 'Registration Form',
            'icon' => 'fa fa-user-plus',
            'programs' => PaudProgram::all(),
            'tk' => PaudProgram::find(1),
            'kb' => PaudProgram::find(2),
            'pindahan' => PaudProgram::find(3),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKB()
    {
        return view('form-registration.create-tk', [
            'title' => 'Daftar TK PAUD Tunas Aksara',
            'subtitle' => 'Registration Form',
            'icon' => 'fa fa-user-plus',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKB(Request $request)
    {
        // dd($request->all());

        // create data father
        $father = new Father;
        $father->nama_lengkap = $request->nama_lengkap_ayah;
        $father->tempat_lahir = $request->tempat_lahir_ayah;
        $father->tanggal_lahir = $request->tanggal_lahir_ayah;
        $father->agama = $request->agama_ayah;
        $father->kewarganegaraan = $request->kewarganegaraan_ayah;
        $father->pendidikan = $request->pendidikan_ayah;
        $father->pekerjaan = $request->pekerjaan_ayah;
        $father->no_telepon = $request->no_telepon_ayah;

        $father->alamat = $request->alamat_murid;
        $father->save();

        // create data mother
        $mother = new Mother;
        $mother->nama_lengkap = $request->nama_lengkap_ibu;
        $mother->tempat_lahir = $request->tempat_lahir_ibu;
        $mother->tanggal_lahir = $request->tanggal_lahir_ibu;
        $mother->agama = $request->agama_ibu;
        $mother->kewarganegaraan = $request->kewarganegaraan_ibu;
        $mother->pendidikan = $request->pendidikan_ibu;
        $mother->pekerjaan = $request->pekerjaan_ibu;
        $mother->no_telepon = $request->no_telepon_ibu;

        $mother->alamat = $request->alamat_murid;
        $mother->save();


        // create data student_detail
        $student_detail = new StudentDetail;
        $student_detail->nama_panggilan = $request->nama_panggilan_murid;
        $student_detail->tempat_lahir = $request->tempat_lahir_murid;
        $student_detail->tanggal_lahir = $request->tanggal_lahir_murid;
        $student_detail->agama = $request->agama_murid;
        $student_detail->kewarganegaraan = $request->kewarganegaraan_murid;
        $student_detail->alamat = $request->alamat_murid;
        $student_detail->jarak_sekolah_rumah = $request->jarak_sekolah_rumah;
        $student_detail->save();


        // create data student
        $student = new Student;

        $student_detail_id = StudentDetail::latest()->first()->id; // get latest id from StudentDetail table
        $father_id = Father::latest()->first()->id;
        $mother_id = Mother::latest()->first()->id;

        $latestStudent = Student::orderBy('created_at', 'DESC')->first();
        $year = date('Y');
        $year_id = substr($year, -2); // get last 2 digit of year

        // get first name
        $first_name = explode(' ', $request->nama_lengkap_murid);
        $first_name = $first_name[0];
        // get last name
        $last_name = explode(' ', $request->nama_lengkap_murid);
        $last_name = $last_name[1];

        $student->student_detail_id = $student_detail_id;
        $student->level_id = 1;
        $student->father_id = $father_id;
        $student->mother_id = $mother_id;
        $student->role = 'Student';
        $student->no_identitas = str_pad($latestStudent->id + 1, 3, "0", STR_PAD_LEFT) . '/paud/' . $year_id;
        $student->nama_lengkap = $request->nama_lengkap_murid;
        $student->username = str_replace(' ', '', strtolower($request->nama_panggilan_murid));
        // $student->email = strtolower($first_name . '.' . $last_name) . '@paud.com';
        $student->email = $request->email;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->password = Hash::make($request->tanggal_lahir_murid);
        $student->save();

        event(new Registered($student));

        Mail::to($student->email)->send(new EmailRegister());

        return "berhasil, coba login";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
