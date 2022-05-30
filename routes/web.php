<?php

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\TeacherController;
use App\Http\Controllers\Administrator\FeedbackController;
use App\Http\Controllers\Administrator\PlaygroupController;
use App\Http\Controllers\DashboardController;

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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // START :: KB Tunas Aksara
    Route::get('/kb-tunas-aksara', [PlaygroupController::class, 'index'])->name('playgroup.index');

    Route::get('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'create'])->name('playgroup.create');
    Route::post('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'store'])->name('playgroup.store');

    Route::get('/kb-tunas-aksara/{student:username}', [PlaygroupController::class, 'show'])->name('playgroup.show');

    Route::get('/kb-tunas-aksara/{student:id}/edit', [PlaygroupController::class, 'edit'])->name('playgroup.edit');
    Route::post('/kb-tunas-aksara/{student:id}', [PlaygroupController::class, 'update'])->name('playgroup.update');

    Route::get('/kb-tunas-aksara/delete/{id}', [PlaygroupController::class, 'destroy'])->name('playgroup.destroy');

    // Peserta didik lulus
    Route::get('/kb-tunas-aksara/peserta-didik-lulus/{student:id}/edit', [PlaygroupController::class, 'graduated'])->name('playgroup.graduated');
    Route::post('/kb-tunas-aksara/peserta-didik-lulus/{student:id}', [PlaygroupController::class, 'graduatedUpdate'])->name('playgroup.graduatedUpdate');
    // END :: KB Tunas Aksara


    // START :: Teacher
    Route::get('/tenaga-pendidik', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/tenaga-pendidik/{user:username}', [TeacherController::class, 'show'])->name('teacher.show');

    Route::get('/guru/tambah-data-tenaga-pendidik', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/guru/tambah-data-tenaga-pendidik', [TeacherController::class, 'store'])->name('teacher.store');

    Route::get('/tenaga-pendidik/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    // END :: Teacher



    // START :: Feedback
    Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    // END :: Feedback
});






require __DIR__ . '/auth.php';
