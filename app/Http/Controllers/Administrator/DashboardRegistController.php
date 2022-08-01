<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Student;
use App\Mail\EmailRegister;
use App\Http\Controllers\Controller;
use App\Mail\EmailAccepted;
use App\Mail\EmailRejected;
use Illuminate\Support\Facades\Mail;

class DashboardRegistController extends Controller
{

    public function index()
    {
        return view('administrator.ppdb.index', [
            'title' => 'PPDB - Calon Peserta Didik Baru',
            // show student data by registration_status_id
            'students' => Student::where('registration_status_id', 1)->get(),
        ]);
    }



    public function updateAccepted(Student $student)
    {
        Student::where('id', $student->id)->update([
            'registration_status_id' => 2,
        ]);

        Mail::to($student->email)->send(new EmailAccepted());

        return redirect()->route('ppdb.index')->with('success', 'Peserta Didik berhasil diterima, Lihat Data di halaman KB / TK Tunas Aksara');
    }



    public function rejected()
    {
        return view('administrator.ppdb.rejected', [
            'title' => 'Tidak Lulus - Penerimaan Peserta Didik Baru (PPDB) PAUD Tunas Aksara',
            // show student data by registration_status_id
            'students' => Student::where('registration_status_id', 3)->get(),
        ]);
    }



    public function updateRejected(Student $student)
    {
        Student::where('id', $student->id)->update([
            'registration_status_id' => 3,
        ]);

        Mail::to($student->email)->send(new EmailRejected());

        return redirect()->route('ppdb.rejected')->with('success', 'Peserta Didik berhasil diterima, Lihat Data di halaman KB / TK Tunas Aksara');
    }



    public function destroy($id)
    {
        $data = Student::find($id);

        $data->delete();
        return redirect()->route('ppdb.index')->with('success', 'Data peserta didik berhasil dihapus!');
    }
}
