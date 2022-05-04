<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Student;
use App\Models\Mutation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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
            // get specific data by level id
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
            'no_telepon_ayah' => 'numeric',

            // step 3 - validasi form identitas ibu
            'nama_lengkap_ibu' => 'required|max:255',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'pendidikan_ibu' => '',
            'pekerjaan_ibu' => '',
            'alamat_ibu' => 'max:1000',
            'no_telepon_ibu' => 'numeric',

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

        // create data student
        $student = new Student;

        $father_id = Father::latest()->first()->id; // get latest id father
        $mother_id = Mother::latest()->first()->id; // get latest id mother
        $mutation_id = Mutation::latest()->first()->id; // get latest id mutation

        $latestStudent = Student::orderBy('created_at', 'DESC')->first();
        $year = date('Y');
        $year_id = substr($year, -2); // get last 2 digit of year


        $student->level_id = 1;
        $student->father_id = $father_id;
        $student->mother_id = $mother_id;
        if (isset($data['diterima_tanggal'])) {
            $student->mutation_id = $mutation_id;
        }
        $student->nis = str_pad($latestStudent->id + 1, 3, "0", STR_PAD_LEFT) . '/paud/' . $year_id;
        $student->nama_lengkap = $data['nama_lengkap_murid'];
        $student->nama_panggilan = $data['nama_panggilan_murid'];
        // $student->avatar = $data['avatar'];
        $student->kelompok = $data['kelompok'];
        $student->jenis_kelamin = $data['jenis_kelamin'];
        $student->tempat_lahir = $data['tempat_lahir_murid'];
        $student->tanggal_lahir = $data['tanggal_lahir_murid'];
        $student->agama = $data['agama_murid'];
        $student->kewarganegaraan = $data['kewarganegaraan_murid'];
        $student->saudara_kandung = $data['saudara_kandung'];
        $student->saudara_tiri = $data['saudara_tiri'];
        $student->saudara_angkat = $data['saudara_angkat'];
        $student->bahasa = $data['bahasa'];
        $student->imunitas_diterima = $data['imunitas_diterima'];
        $student->ciri_khusus = $data['ciri_khusus'];
        $student->gol_darah = $data['gol_darah'];
        $student->alamat = $data['alamat_murid'];
        $student->no_telepon = $data['no_telepon_murid'];
        $student->jarak_sekolah_rumah = $data['jarak_sekolah_rumah'];
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
            'student' => $student,
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
    public function edit()
    {
        return view('playgroup.edit');
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
