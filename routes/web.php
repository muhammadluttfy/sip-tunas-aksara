<?php

use App\Http\Controllers\Adminsistrator\FeedbackController;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adminsistrator\PlaygroupController;
use App\Http\Controllers\Adminsistrator\PlaygroupGraduatedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth:user,student', 'role:Kepala Sekolah,Administrator,Student']], function () {

    Route::get('/', function () {
        return redirect()->route('login');
    })->middleware('guest:user,student');

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'title' => 'Dashboard - Sistem Informasi Manajemen PAUD Tunas Aksara',
            'kb_student' => Student::where('level_id', 1)->count(),
            'tk_student' => Student::where('level_id', 2)->count(),
            'count_teachers' => User::count(),
        ]);
    })->name('dashboard');

    // START :: KB Tunas Aksara
    Route::get('/kb-tunas-aksara', [PlaygroupController::class, 'index'])->name('administrator.playgroup.index');
    Route::get('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'create'])->name('playgroup.create');

    Route::post('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'store'])->name('playgroup.store');

    Route::get('/kb-tunas-aksara/{student:username}', [PlaygroupController::class, 'show'])->name('playgroup.show');
    Route::get('/kb-tunas-aksara/{student:id}/edit', [PlaygroupController::class, 'edit'])->name('playgroup.edit');
    Route::post('/kb-tunas-aksara/{student:id}', [PlaygroupController::class, 'update'])->name('playgroup.update');

    Route::get('/kb-tunas-aksara/delete/{id}', [PlaygroupController::class, 'destroy'])->name('playgroup.destroy');

    // Graduated Routes
    Route::get('/kb-tunas-aksaraa/aa', [PlaygroupGraduatedController::class, 'index'])->name('playgroup.graduated.index');
    // END :: KB Tunas Aksara



    // START :: Feedback
    Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    // END :: Feedback
});






require __DIR__ . '/auth.php';
