<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\PostController;
use App\Http\Controllers\Administrator\TeacherController;
use App\Http\Controllers\Administrator\PlaygroupController;
use App\Http\Controllers\Administrator\PostCategoryController;
use App\Http\Controllers\Administrator\IncomingLetterController;
use App\Http\Controllers\Administrator\LetterCategoryController;
use App\Http\Controllers\Administrator\RaportController;

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

    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    // START :: KB Tunas Aksara
    Route::get('/kb-tunas-aksara', [PlaygroupController::class, 'index'])->name('playgroup.index');

    Route::get('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'create'])->name('playgroup.create');
    Route::post('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'store'])->name('playgroup.store');

    Route::get('/kb-tunas-aksara/{student:username}', [PlaygroupController::class, 'show'])->name('playgroup.show');

    Route::get('/kb-tunas-aksara/{student:id}/edit', [PlaygroupController::class, 'edit'])->name('playgroup.edit');
    Route::post('/kb-tunas-aksara/{student:id}', [PlaygroupController::class, 'update'])->name('playgroup.update');

    Route::get('/kb-tunas-aksara/delete/{id}', [PlaygroupController::class, 'destroy'])->name('playgroup.destroy');


    // Nilai Raport
    Route::get('/nilai-raport/{student:id}', [RaportController::class, 'show'])->name('playgroup.raport.show');

    Route::get('/tambah-nilai-raport/{student:id}/create', [RaportController::class, 'create'])->name('playgroup.raport.create');
    Route::post('/tambah-nilai-raport/{student:id}/create', [RaportController::class, 'store'])->name('playgroup.raport.store');

    Route::get('/nilai-raport/semester-1/{student:id}/edit', [RaportController::class, 'editSemester1'])->name('playgroup.raport.editSemester1');
    Route::post('/nilai-raport/semester-1/{student:id}', [RaportController::class, 'updateSemester1'])->name('playgroup.raport.updateSemester1');

    Route::get('/nilai-raport/semester-2/{student:id}/edit', [RaportController::class, 'editSemester2'])->name('playgroup.raport.editSemester2');
    Route::post('/nilai-raport/semester-2/{student:id}', [RaportController::class, 'updateSemester2'])->name('playgroup.raport.updateSemester2');

    Route::get('/nilai-raport/semester-3/{student:id}/edit', [RaportController::class, 'editSemester3'])->name('playgroup.raport.editSemester3');
    Route::post('/nilai-raport/semester-3/{student:id}', [RaportController::class, 'updateSemester3'])->name('playgroup.raport.updateSemester3');

    Route::get('/nilai-raport/semester-4/{student:id}/edit', [RaportController::class, 'editSemester4'])->name('playgroup.raport.editSemester4');
    Route::post('/nilai-raport/semester-4/{student:id}', [RaportController::class, 'updateSemester4'])->name('playgroup.raport.updateSemester4');

    Route::get('/nilai-raport/delete/{id}', [RaportController::class, 'destroy'])->name('playgroup.raport.destroy');

    // END :: KB Tunas Aksara


    // START :: Teacher
    Route::get('/tenaga-pendidik', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/tenaga-pendidik/{user:username}', [TeacherController::class, 'show'])->name('teacher.show');

    Route::get('/tambah-tenaga-pendidik', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/tambah-tenaga-pendidik', [TeacherController::class, 'store'])->name('teacher.store');

    Route::get('/tenaga-pendidik/{user:id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/tenaga-pendidik/{user:id}', [TeacherController::class, 'update'])->name('teacher.update');

    Route::get('/tenaga-pendidik/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    // END :: Teacher



    // START :: Forum PAUD
    // ==== Categories
    Route::get('/categories', [PostCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [PostCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/create', [PostCategoryController::class, 'store'])->name('categories.store');

    Route::get('/categories/{category:id}/edit', [PostCategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/{category:id}', [PostCategoryController::class, 'update'])->name('categories.update');

    Route::get('/categories/delete/{id}', [PostCategoryController::class, 'destroy'])->name('categories.destroy');


    // ==== Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/posts/{post:id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{post:id}', [PostController::class, 'update'])->name('posts.update');

    Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/comment/{post:id}', [PostController::class, 'comment'])->name('posts.comment');
    // END :: Forum PAUD


    // START :: Management Surat
    // ==== Kategori Surat
    Route::get('/surat/kategori', [LetterCategoryController::class, 'index'])->name('letters.index');

    Route::get('/surat/kategori/create', [LetterCategoryController::class, 'create'])->name('letters.create');
    Route::post('/surat/kategori/create', [LetterCategoryController::class, 'store'])->name('letters.store');

    Route::get('/surat/kategori/{category:id}/edit', [LetterCategoryController::class, 'edit'])->name('letters.edit');
    Route::post('/surat/kategori/{category:id}', [LetterCategoryController::class, 'update'])->name('letters.update');

    Route::get('/surat/delete/{id}', [LetterCategoryController::class, 'destroy'])->name('letters.destroy');


    // ==== Surat Masuk
    Route::get('/surat-masuk', [IncomingLetterController::class, 'index'])->name('incoming.index');

    Route::get('/surat-masuk/create', [IncomingLetterController::class, 'create'])->name('incoming.create');
    Route::post('/surat-masuk/create', [IncomingLetterController::class, 'store'])->name('incoming.store');

    Route::get('/surat-masuk/{letter:id}/edit', [IncomingLetterController::class, 'edit'])->name('incoming.edit');
    Route::post('/surat-masuk/{letter:id}', [IncomingLetterController::class, 'update'])->name('incoming.update');

    Route::get('/surat-masuk/{letter:id}', [IncomingLetterController::class, 'show'])->name('incoming.show');

    Route::get('/surat-masuk/delete/{id}', [IncomingLetterController::class, 'destroy'])->name('incoming.destroy');
    // END :: Management Surat
});


// START :: Profil Tenaga Pendidik
// Route::get('/profil-tenaga-pendidik', [Controller::class, 'profiles'])->name('profiles');
Route::get('/profil/{user:username}', [Controller::class, 'profile'])->name('profile');
// END :: Profil Tenaga Pendidik






require __DIR__ . '/auth.php';
