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



    public function createKB()
    {
        return view('form-registration.create-kb', [
            'title' => 'Daftar TK PAUD Tunas Aksara',
            'subtitle' => 'Registration Form',
            'icon' => 'fa fa-user-plus',
        ]);
    }

    public function storeKB(Request $request)
    {
        $request->validate([
            // step 1 - validasi form peserta didik
            'avatar' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'nama_lengkap_murid' => 'required|max:255',
            'nama_panggilan_murid' => 'required|max:64',
            'jenis_kelamin' => 'required',
            'agama_murid' => 'required',
            'tempat_lahir_murid' => 'required',
            'tanggal_lahir_murid' => 'required|date',
            'saudara_kandung' => '',
            'saudara_tiri' => '',
            'saudara_angkat' => '',
            // 'imunitas_diterima' => '',
            // 'ciri_khusus' => '',
            // 'bahasa' => 'required',
            // 'gol_darah' => '',
            'alamat_murid' => 'required',
            'no_telepon_murid' => '',
            'jarak_sekolah_rumah' => '',

            // step 2 - validasi form identitas ayah
            'nama_lengkap_ayah' => 'required|max:255',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required',
            'kewarganegaraan_ayah' => 'required',
            'pendidikan_ayah' => '',
            'pekerjaan_ayah' => '',
            'no_telepon_ayah' => '',

            // step 3 - validasi form identitas ibu
            'nama_lengkap_ibu' => 'required|max:255',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'pendidikan_ibu' => '',
            'pekerjaan_ibu' => '',
            'no_telepon_ibu' => '',
        ]);

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
        $student_detail->saudara_kandung = $request->saudara_kandung;
        $student_detail->saudara_tiri = $request->saudara_tiri;
        $student_detail->saudara_angkat = $request->saudara_angkat;
        $student_detail->bahasa = $request->bahasa;
        $student_detail->imunitas_diterima = $request->imunitas_diterima;
        $student_detail->ciri_khusus = $request->ciri_khusus;
        $student_detail->gol_darah = $request->gol_darah;
        $student_detail->alamat = $request->alamat_murid;
        $student_detail->jarak_sekolah_rumah = $request->jarak_sekolah_rumah;
        $student_detail->save();

        // create data student
        $student = new Student;

        $student_detail_id = StudentDetail::latest()->first()->id; // get latest id from StudentDetail table
        $father_id = Father::latest()->first()->id;
        $mother_id = Mother::latest()->first()->id;
        $student->registration_status_id = 1;

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
        $student->email = $request->email;
        $student->avatar = $request->file('avatar')->store('avatars');
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->password = Hash::make($request->tanggal_lahir_murid);
        $student->email_verified_at = now();
        $student->save();

        event(new Registered($student));

        Mail::to($student->email)->send(new EmailRegister());

        return redirect(route('login'))->with('success', 'Pendaftaran berhasil, silahkan cek email Anda untuk mendapatkan akses login!');
    }



    public function createTK()
    {
        return view('form-registration.create-tk', [
            'title' => 'Daftar TK PAUD Tunas Aksara',
            'subtitle' => 'Registration Form',
            'icon' => 'fa fa-user-plus',
        ]);
    }

    public function storeTK(Request $request)
    {
        $request->validate([
            // step 1 - validasi form peserta didik
            'avatar' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'nama_lengkap_murid' => 'required|max:255',
            'nama_panggilan_murid' => 'required|max:64',
            'jenis_kelamin' => 'required',
            'agama_murid' => 'required',
            'tempat_lahir_murid' => 'required',
            'tanggal_lahir_murid' => 'required|date',
            'saudara_kandung' => '',
            'saudara_tiri' => '',
            'saudara_angkat' => '',
            'imunitas_diterima' => '',
            'ciri_khusus' => '',
            'bahasa' => 'required',
            'gol_darah' => '',
            'alamat_murid' => 'required',
            'no_telepon_murid' => '',
            'jarak_sekolah_rumah' => '',

            // step 2 - validasi form identitas ayah
            'nama_lengkap_ayah' => 'required|max:255',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required',
            'kewarganegaraan_ayah' => 'required',
            'pendidikan_ayah' => '',
            'pekerjaan_ayah' => '',
            'no_telepon_ayah' => '',

            // step 3 - validasi form identitas ibu
            'nama_lengkap_ibu' => 'required|max:255',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'pendidikan_ibu' => '',
            'pekerjaan_ibu' => '',
            'no_telepon_ibu' => '',
        ]);

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
        $student_detail->saudara_kandung = $request->saudara_kandung;
        $student_detail->saudara_tiri = $request->saudara_tiri;
        $student_detail->saudara_angkat = $request->saudara_angkat;
        $student_detail->bahasa = $request->bahasa;
        $student_detail->imunitas_diterima = $request->imunitas_diterima;
        $student_detail->ciri_khusus = $request->ciri_khusus;
        $student_detail->gol_darah = $request->gol_darah;
        $student_detail->alamat = $request->alamat_murid;
        $student_detail->jarak_sekolah_rumah = $request->jarak_sekolah_rumah;
        $student_detail->save();

        // create data student
        $student = new Student;

        $student_detail_id = StudentDetail::latest()->first()->id; // get latest id from StudentDetail table
        $father_id = Father::latest()->first()->id;
        $mother_id = Mother::latest()->first()->id;
        $student->registration_status_id = 2;

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
        $student->level_id = 2;
        $student->father_id = $father_id;
        $student->mother_id = $mother_id;
        $student->role = 'Student';
        $student->no_identitas = str_pad($latestStudent->id + 1, 3, "0", STR_PAD_LEFT) . '/paud/' . $year_id;
        $student->nama_lengkap = $request->nama_lengkap_murid;
        $student->username = str_replace(' ', '', strtolower($request->nama_panggilan_murid));
        $student->email = $request->email;
        $student->avatar = $request->file('avatar')->store('avatars');
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->password = Hash::make($request->tanggal_lahir_murid);
        $student->email_verified_at = now();
        $student->save();

        event(new Registered($student));

        Mail::to($student->email)->send(new EmailRegister());

        return redirect(route('login'))->with('success', 'Pendaftaran berhasil, silahkan cek email Anda untuk mendapatkan akses login!');
    }



    public function createPindahan()
    {
        return view('form-registration.create-pindahan', [
            'title' => 'Daftar TK PAUD Tunas Aksara',
            'subtitle' => 'Registration Form',
            'icon' => 'fa fa-user-plus',
        ]);
    }

    public function storePindahan(Request $request)
    {
        $request->validate([
            // step 1 - validasi form peserta didik
            'avatar' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'nama_lengkap_murid' => 'required|max:255',
            'nama_panggilan_murid' => 'required|max:64',
            'jenis_kelamin' => 'required',
            'agama_murid' => 'required',
            'tempat_lahir_murid' => 'required',
            'tanggal_lahir_murid' => 'required|date',
            'saudara_kandung' => '',
            'saudara_tiri' => '',
            'saudara_angkat' => '',
            'imunitas_diterima' => '',
            'ciri_khusus' => '',
            'bahasa' => 'required',
            'gol_darah' => '',
            'alamat_murid' => 'required',
            'no_telepon_murid' => '',
            'jarak_sekolah_rumah' => '',

            // step 2 - validasi form identitas ayah
            'nama_lengkap_ayah' => 'required|max:255',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required',
            'kewarganegaraan_ayah' => 'required',
            'pendidikan_ayah' => '',
            'pekerjaan_ayah' => '',
            'no_telepon_ayah' => '',

            // step 3 - validasi form identitas ibu
            'nama_lengkap_ibu' => 'required|max:255',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'pendidikan_ibu' => '',
            'pekerjaan_ibu' => '',
            'no_telepon_ibu' => '',

            // step 4 - validasi form mutasi (opsional)
            'tanggal_mutasi' => '',
            'instansi_asal' => '',
            'tgl_meninggalkan_instansi' => '',
            'alasan' => '',
        ]);

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


        /// create data mutation
        $mutation = new Mutation;
        $mutation->diterima_tanggal = $request->diterima_tanggal;
        $mutation->instansi_asal = $request->instansi_asal;
        $mutation->tgl_meninggalkan_instansi = $request->tgl_meninggalkan_instansi;
        $mutation->alasan = $request->alasan;
        $mutation->save();


        // create data student_detail
        $student_detail = new StudentDetail;
        $student_detail->nama_panggilan = $request->nama_panggilan_murid;
        $student_detail->tempat_lahir = $request->tempat_lahir_murid;
        $student_detail->tanggal_lahir = $request->tanggal_lahir_murid;
        $student_detail->agama = $request->agama_murid;
        $student_detail->kewarganegaraan = $request->kewarganegaraan_murid;
        $student_detail->saudara_kandung = $request->saudara_kandung;
        $student_detail->saudara_tiri = $request->saudara_tiri;
        $student_detail->saudara_angkat = $request->saudara_angkat;
        $student_detail->bahasa = $request->bahasa;
        $student_detail->imunitas_diterima = $request->imunitas_diterima;
        $student_detail->ciri_khusus = $request->ciri_khusus;
        $student_detail->gol_darah = $request->gol_darah;
        $student_detail->alamat = $request->alamat_murid;
        $student_detail->jarak_sekolah_rumah = $request->jarak_sekolah_rumah;
        $student_detail->save();

        // create data student
        $student = new Student;

        $student_detail_id = StudentDetail::latest()->first()->id; // get latest id from StudentDetail table
        $father_id = Father::latest()->first()->id;
        $mother_id = Mother::latest()->first()->id;
        $mutation_id = Mutation::latest()->first()->id;
        $student->registration_status_id = 1;

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
        $student->level_id = $request->level_id;
        $student->father_id = $father_id;
        $student->mother_id = $mother_id;
        $student->mutation_id = $mutation_id;
        $student->role = 'Student';
        $student->no_identitas = str_pad($latestStudent->id + 1, 3, "0", STR_PAD_LEFT) . '/paud/' . $year_id;
        $student->nama_lengkap = $request->nama_lengkap_murid;
        $student->username = str_replace(' ', '', strtolower($request->nama_panggilan_murid));
        $student->email = $request->email;
        $student->avatar = $request->file('avatar')->store('avatars');
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->password = Hash::make($request->tanggal_lahir_murid);
        $student->email_verified_at = now();
        $student->save();

        event(new Registered($student));

        Mail::to($student->email)->send(new EmailRegister());

        return redirect(route('login'))->with('success', 'Pendaftaran berhasil, silahkan cek email Anda untuk mendapatkan akses login!');
    }



    public function panduan()
    {
        return view('form-registration.panduan', [
            'title' => 'Panduan Pendaftaran PPDB PAUD Tunas Aksara' . date('Y'),
        ]);
    }
}
