<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Student;
use App\Models\PaudProgram;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardProgramController extends Controller
{
    public function program()
    {
        return view('administrator.ppdb.program', [
            'title' => 'Program Penerimaan Peserta Didik Baru (PPDB) PAUD Tunas Aksara',
            'programs' => PaudProgram::all(),
        ]);
    }


    public function editProgram($id)
    {
        $program = PaudProgram::find($id);
        return view('administrator.ppdb.edit-program', [
            'title' => 'Edit Program Penerimaan Peserta Didik Baru (PPDB) PAUD Tunas Aksara',
            'program' => $program,
        ]);
    }



    public function updateProgram(Request $request, $id)
    {
        // $request->validate([
        //     'slug' => 'required',
        //     'status' => 'required',
        //     'mulai_program' => 'required',
        //     'selesai_program' => 'required',
        // ]);


        PaudProgram::where('id', $id)->update([
            'nama_program' => $request->nama_program,
            'slug' => Str::slug($request->nama_program),
            'status' => $request->status,
            'mulai_program' => $request->mulai_program,
            'selesai_program' => $request->selesai_program,
        ]);


        // optional 2
        // $program = PaudProgram::find($request->id);
        // $program->nama_program = $request->nama_program;
        // $program->slug = $request->slug;
        // $program->status = $request->status;
        // $program->mulai_program = $request->mulai_program;
        // $program->selesai_program = $request->selesai_program;
        // $program->route = $request->route;
        // $program->save();
        return redirect()->route('ppdb.program')->with('success', 'Program berhasil diubah');
    }



    public function destroyProgram($id)
    {
        $data = PaudProgram::find($id);

        $data->delete();
        return redirect()->route('ppdb.program')->with('success', 'Program PAUD berhasil dihapus!');
    }
}
