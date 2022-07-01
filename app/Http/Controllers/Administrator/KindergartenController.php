<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Father;
use App\Models\Mother;
use App\Models\Student;
use App\Models\Mutation;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class KindergartenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('administrator.kindergarten.index', [
            'title' => 'KB Tunas Aksara - Semua Peserta Didik',
            // get all data student by level_id = 1
            'students' => Student::where('level_id', 2)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.kindergarten.create', [
            'title' => 'KB Tunas Aksara - Tambah Peserta Didik',
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
            // step 1 - validasi form peserta didik
            'jenjang_pendidikan' => '',
            'avatar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lengkap_murid' => 'required|max:255',
            'nama_panggilan_murid' => 'required|max:64',
            'jenis_kelamin' => 'required',
            'agama_murid' => 'required',
            'tempat_lahir_murid' => 'required',
            'tanggal_lahir_murid' => 'required|date',
            'saudara_kandung' => 'numeric',
            'saudara_tiri' => '',
            'saudara_angkat' => '',
            'imunitas_diterima' => '',
            'ciri_khusus' => '',
            'bahasa' => 'required',
            'gol_darah' => '',
            'alamat_murid' => 'required',
            'no_telepon_murid' => '',
            'jarak_sekolah_rumah' => '',
            'tanggal_lulus_kb' => 'date',

            // step 2 - validasi form identitas ayah
            'nama_lengkap_ayah' => 'required|max:255',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required',
            'kewarganegaraan_ayah' => 'required',
            'pendidikan_ayah' => '',
            'pekerjaan_ayah' => '',
            'alamat_ayah' => 'max:1000',
            'no_telepon_ayah' => '',

            // step 3 - validasi form identitas ibu
            'nama_lengkap_ibu' => 'required|max:255',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'pendidikan_ibu' => '',
            'pekerjaan_ibu' => '',
            'alamat_ibu' => 'max:1000',
            'no_telepon_ibu' => '',

            // step 4 - validasi form mutasi (opsional)
            'tanggal_mutasi' => '',
            'ditempatkan_di_kelompok' => '',
            'instansi_asal' => '',
            'tgl_meninggalkan_instansi' => '',
            'alasan' => '',
        ]);


        $data = $request->all();

        // create data father
        $father = new Father;
        $father->nama_lengkap = $request->nama_lengkap_ayah;
        $father->tempat_lahir = $request->tempat_lahir_ayah;
        $father->tanggal_lahir = $request->tanggal_lahir_ayah;
        $father->agama = $request->agama_ayah;
        $father->kewarganegaraan = $request->kewarganegaraan_ayah;
        $father->pendidikan = $request->pendidikan_ayah;
        $father->pekerjaan = $request->pekerjaan_ayah;
        $father->alamat = $request->alamat_ayah;
        $father->no_telepon = $request->no_telepon_ayah;
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
        $mother->alamat = $request->alamat_ibu;
        $mother->no_telepon = $request->no_telepon_ibu;
        $mother->save();

        /// create data mutation
        $mutation = new Mutation;
        $mutation->diterima_tanggal = $request->diterima_tanggal;
        $mutation->ditempatkan_di_kelompok = $request->ditempatkan_di_kelompok;
        $mutation->instansi_asal = $request->instansi_asal;
        $mutation->tgl_meninggalkan_instansi = $request->tgl_meninggalkan_instansi;
        $mutation->alasan = $request->alasan;
        $mutation->save();


        // create data student_detail
        $student_detail = new StudentDetail;
        $student_detail->nama_panggilan = $request->nama_panggilan_murid;
        $student_detail->kelompok = $request->kelompok;
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
        $student_detail->no_telepon = $request->no_telepon_murid;
        $student_detail->jarak_sekolah_rumah = $request->jarak_sekolah_rumah;
        $student_detail->save();


        // create data student
        $student = new Student;

        $student_detail_id = StudentDetail::latest()->first()->id; // get latest id from StudentDetail table
        $father_id = Father::latest()->first()->id;
        $mother_id = Mother::latest()->first()->id;
        $mutation_id = Mutation::latest()->first()->id;

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
        if (isset($request->diterima_tanggal)) {
            $student->mutation_id = $mutation_id;
        }
        $student->role = 'Student';
        $student->no_identitas = str_pad($latestStudent->id + 1, 3, "0", STR_PAD_LEFT) . '/paud/' . $year_id;
        $student->nama_lengkap = $request->nama_lengkap_murid;
        $student->username = str_replace(' ', '', strtolower($request->nama_panggilan_murid));
        $student->email = strtolower($first_name . '.' . $last_name) . '@paud.com';
        $student->avatar = $request->file('avatar')->store('avatars');
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->password = Hash::make($request->tanggal_lahir_murid);
        $student->save();

        event(new Registered($student));


        return redirect()->route('playgroup.index')->with('success', 'Data peserta didik berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('administrator.kindergarten.show', [
            // get data by id
            'title' => $student->nama_lengkap . ' ' . '(' . $student->username . ')',
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('administrator.kindergarten.edit', [
            'title' => 'Edit Profil' . ' - ' . $student->nama_lengkap . ' ' . '(' . $student->username . ')',
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, Mutation $mutation)
    {
        $request->validate([
            // step 1 - validasi form peserta didik
            'avatar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_lengkap_murid' => 'required|max:255',
            'nama_panggilan_murid' => 'required|max:64',
            'jenis_kelamin' => 'required',
            'agama_murid' => 'required',
            'tempat_lahir_murid' => 'required',
            'tanggal_lahir_murid' => 'required|date',
            'saudara_kandung' => 'numeric',
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
            'alamat_ayah' => 'max:1000',
            'no_telepon_ayah' => '',

            // step 3 - validasi form identitas ibu
            'nama_lengkap_ibu' => 'required|max:255',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'pendidikan_ibu' => '',
            'pekerjaan_ibu' => '',
            'alamat_ibu' => 'max:1000',
            'no_telepon_ibu' => '',

            // step 4 - validasi form mutasi (opsional)
            'tanggal_mutasi' => '',
            'ditempatkan_di_kelompok' => '',
            'instansi_asal' => '',
            'tgl_meninggalkan_instansi' => '',
            'alasan' => '',
        ]);

        Father::where('id', $student->father_id)->update([
            'nama_lengkap' => $request->nama_lengkap_ayah,
            'tempat_lahir' => $request->tempat_lahir_ayah,
            'tanggal_lahir' => $request->tanggal_lahir_ayah,
            'agama' => $request->agama_ayah,
            'kewarganegaraan' => $request->kewarganegaraan_ayah,
            'pendidikan' => $request->pendidikan_ayah,
            'pekerjaan' => $request->pekerjaan_ayah,
            'alamat' => $request->alamat_ayah,
            'no_telepon' => $request->no_telepon_ayah,
        ]);

        // update data mother
        Mother::where('id', $student->mother_id)->update([
            'nama_lengkap' => $request->nama_lengkap_ibu,
            'tempat_lahir' => $request->tempat_lahir_ibu,
            'tanggal_lahir' => $request->tanggal_lahir_ibu,
            'agama' => $request->agama_ibu,
            'kewarganegaraan' => $request->kewarganegaraan_ibu,
            'pendidikan' => $request->pendidikan_ibu,
            'pekerjaan' => $request->pekerjaan_ibu,
            'alamat' => $request->alamat_ibu,
            'no_telepon' => $request->no_telepon_ibu,
        ]);


        // !!!! START : MUTATION MASIH ERROR !!!

        // update data mutation
        if ($student->mutation_id != null) {
            Mutation::where('id', $student->mutation_id)->update([
                'diterima_tanggal' => $request->diterima_tanggal,
                'ditempatkan_di_kelompok' => $request->ditempatkan_di_kelompok,
                'instansi_asal' => $request->instansi_asal,
                'tgl_meninggalkan_instansi' => $request->tgl_meninggalkan_instansi,
                'alasan' => $request->alasan,
            ]);
        } else {
            /// create data mutation
            $mutation = new Mutation;
            $mutation->diterima_tanggal = $request->diterima_tanggal;
            $mutation->ditempatkan_di_kelompok = $request->ditempatkan_di_kelompok;
            $mutation->instansi_asal = $request->instansi_asal;
            $mutation->tgl_meninggalkan_instansi = $request->tgl_meninggalkan_instansi;
            $mutation->alasan = $request->alasan;
            $mutation->save();
        }


        // !!!! END : MUTATION MASIH ERROR !!!


        // update data student_detail
        StudentDetail::where('id', $student->student_detail_id)->update([
            'nama_panggilan' => $request->nama_panggilan_murid,
            'kelompok' => $request->kelompok,
            'tempat_lahir' => $request->tempat_lahir_murid,
            'tanggal_lahir' => $request->tanggal_lahir_murid,
            'agama' => $request->agama_murid,
            'kewarganegaraan' => $request->kewarganegaraan_murid,
            'saudara_kandung' => $request->saudara_kandung,
            'saudara_tiri' => $request->saudara_tiri,
            'saudara_angkat' => $request->saudara_angkat,
            'bahasa' => $request->bahasa,
            'imunitas_diterima' => $request->imunitas_diterima,
            'ciri_khusus' => $request->ciri_khusus,
            'gol_darah' => $request->gol_darah,
            'alamat' => $request->alamat_murid,
            'no_telepon' => $request->no_telepon_murid,
            'jarak_sekolah_rumah' => $request->jarak_sekolah_rumah,
            'tanggal_lulus_kb' => $request->tanggal_lulus_kb,
        ]);


        // update data student
        Student::where('id', $student->id)->update([
            'nama_lengkap' => $request->nama_lengkap_murid,
            'jenis_kelamin' => $request->jenis_kelamin_murid,
            'username' => str_replace(' ', '', strtolower($request->nama_lengkap_murid)),
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        if ($request->hasFile('avatar')) {
            if ($request->oldAvatar) {
                Storage::delete($request->oldAvatar);
            }

            Student::where('id', $student->id)->update([
                'avatar' => $request->file('avatar')->store('avatars'),
            ]);
        }

        // START : MASIH ERROR ID MUTATION
        if ($request->diterima_tanggal != null) {
            $student->mutation_id = $mutation->id;
        }
        // END : MASIH ERROR ID MUTATION

        return redirect()->route('playgroup.index')->with('success', 'Data peserta didik berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id)
    {
        $data = Student::find($id);

        if ($student->avatar) {
            Storage::delete($student->avatar);
        }

        $data->delete();
        return redirect()->route('kindergarten.index')->with('success', 'Data peserta didik berhasil dihapus!');
    }
}
