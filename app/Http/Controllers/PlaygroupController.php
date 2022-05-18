<?php

namespace App\Http\Controllers;

use App\Models\Father;
use App\Models\Mother;
use App\Models\Student;
use App\Models\Mutation;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PlaygroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('playgroup.index', [
            'title' => 'KB Tunas Aksara - Semua Peserta Didik',
            // get all data student by level_id = 1
            'students' => Student::where('level_id', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playgroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $request->validate([
            // step 1 - validasi form peserta didik
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

        // create data father
        $father = new Father;
        $father->nama_lengkap = $data['nama_lengkap_ayah'];
        $father->tempat_lahir = $data['tempat_lahir_ayah'];
        $father->tanggal_lahir = $data['tanggal_lahir_ayah'];
        $father->agama = $data['agama_ayah'];
        $father->kewarganegaraan = $data['kewarganegaraan_ayah'];
        $father->pendidikan = $data['pendidikan_ayah'];
        $father->pekerjaan = $data['pekerjaan_ayah'];
        $father->alamat = $data['alamat_ayah'];
        $father->no_telepon = $data['no_telepon_ayah'];
        $father->save();

        // create data mother
        $mother = new Mother;
        $mother->nama_lengkap = $data['nama_lengkap_ibu'];
        $mother->tempat_lahir = $data['tempat_lahir_ibu'];
        $mother->tanggal_lahir = $data['tanggal_lahir_ibu'];
        $mother->agama = $data['agama_ibu'];
        $mother->kewarganegaraan = $data['kewarganegaraan_ibu'];
        $mother->pendidikan = $data['pendidikan_ibu'];
        $mother->pekerjaan = $data['pekerjaan_ibu'];
        $mother->alamat = $data['alamat_ibu'];
        $mother->no_telepon = $data['no_telepon_ibu'];
        $mother->save();

        // create data mutation
        $mutation = new Mutation;

        // dont add mutation if not exist
        if (isset($data['diterima_tanggal'])) {
            $mutation->diterima_tanggal = $data['diterima_tanggal'];
            $mutation->ditempatkan_di_kelompok = $data['ditempatkan_di_kelompok'];
            $mutation->instansi_asal = $data['instansi_asal'];
            $mutation->tgl_meninggalkan_instansi = $data['tgl_meninggalkan_instansi'];
            $mutation->alasan = $data['alasan'];
            $mutation->save();
        }


        // create data student_detail
        $student_detail = new StudentDetail;
        $student_detail->nama_panggilan = $data['nama_panggilan_murid'];
        $student_detail->kelompok = $data['kelompok'];
        $student_detail->jenis_kelamin = $data['jenis_kelamin'];
        $student_detail->tempat_lahir = $data['tempat_lahir_murid'];
        $student_detail->tanggal_lahir = $data['tanggal_lahir_murid'];
        $student_detail->agama = $data['agama_murid'];
        $student_detail->kewarganegaraan = $data['kewarganegaraan_murid'];
        $student_detail->saudara_kandung = $data['saudara_kandung'];
        $student_detail->saudara_tiri = $data['saudara_tiri'];
        $student_detail->saudara_angkat = $data['saudara_angkat'];
        $student_detail->bahasa = $data['bahasa'];
        $student_detail->imunitas_diterima = $data['imunitas_diterima'];
        $student_detail->ciri_khusus = $data['ciri_khusus'];
        $student_detail->gol_darah = $data['gol_darah'];
        $student_detail->alamat = $data['alamat_murid'];
        $student_detail->no_telepon = $data['no_telepon_murid'];
        $student_detail->jarak_sekolah_rumah = $data['jarak_sekolah_rumah'];
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
        $first_name = explode(' ', $data['nama_lengkap_murid']);
        $first_name = $first_name[0];
        // get last name
        $last_name = explode(' ', $data['nama_lengkap_murid']);
        $last_name = $last_name[1];

        $student->student_detail_id = $student_detail_id;
        $student->level_id = 1;
        $student->father_id = $father_id;
        $student->mother_id = $mother_id;
        if (isset($data['diterima_tanggal'])) {
            $student->mutation_id = $mutation_id;
        }
        $student->role = 'Student';
        $student->no_identitas = str_pad($latestStudent->id + 1, 3, "0", STR_PAD_LEFT) . '/paud/' . $year_id;
        $student->nama_lengkap = $data['nama_lengkap_murid'];
        $student->username = '@' . str_replace(' ', '', strtolower($data['nama_panggilan_murid']));
        $student->email = strtolower($first_name . '.' . $last_name) . '@paud.com';
        $student->password = Hash::make($data['tanggal_lahir_murid']);
        $student->save();


        return redirect()->route('playgroup.index')->with('success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('playgroup.show', [
            // get data by id
            'title' => $student->nama_lengkap . ' ' . '(' . $student->username . ')',
            'student' => $student,
            'student_detail' => $student->student_detail,
            'father' => $student->father,
            'mother' => $student->mother,
            'mutation' => $student->mutation,
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
        return view('playgroup.edit', [
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
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('playgroup.index')->with('success', 'Task Deleted Successfully!');
    }
}
