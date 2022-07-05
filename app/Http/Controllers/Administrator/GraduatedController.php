<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentDetail;

class GraduatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        return view('administrator.graduated.create', [
            'title' => 'Pendaftaran Lulusan | ' . $student->nama_lengkap,
            'student' => $student,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {

        if ($student->level_id == 1) {
            $request->validate([
                'tanggal_lulus_kb' => 'required',
                'level_id' => 'required',
                'paud_tujuan_pindah' => '',
                'alasan_pindah_paud' => '',
            ]);

            StudentDetail::where('id', $student->student_detail_id)->update([
                'tanggal_lulus_kb' => $request->tanggal_lulus_kb,
                'paud_tujuan_pindah' => $request->paud_tujuan_pindah,
                'alasan_pindah_paud' => $request->alasan_pindah_paud,
            ]);
            Student::where('id', $student->id)->update([
                'level_id' => $request->level_id,
            ]);

            return redirect()->route('kindergarten.index')->with('success', 'Peserta telah dinyatakan lulus');
        } elseif ($student->level_id == 2) {
            $request->validate([
                'tanggal_lulus_tk' => 'required',
                'level_id' => 'required',
            ]);

            StudentDetail::where('id', $student->student_detail_id)->update([
                'tanggal_lulus_tk' => $request->tanggal_lulus_tk,
            ]);
            Student::where('id', $student->id)->update([
                'level_id' => $request->level_id,
            ]);

            return redirect()->back()->with('success', 'Peserta telah dinyatakan lulus');
        } else {
            return "gagal";
        }
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
    public function edit(Student $student)
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
    public function update(Request $request, Student $student)
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
