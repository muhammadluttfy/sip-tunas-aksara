<?php

use App\Http\Controllers\Administrator\KindergartenController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\PostController;
use App\Http\Controllers\Administrator\LetterController;
use App\Http\Controllers\Administrator\RaportController;
use App\Http\Controllers\Administrator\TeacherController;
use App\Http\Controllers\Administrator\PlaygroupController;
use App\Http\Controllers\Administrator\PostCategoryController;
use App\Http\Controllers\Administrator\LetterCategoryController;

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


Route::group(['middleware' => ['auth:user,student', 'roleCheck:Kepala Sekolah,Administrator,Student']], function () {

    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::get('/', function () {
        return redirect()->route('login');
    })->middleware('guest:user,student');

    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    // START :: KB Tunas Aksara
    Route::get('/kb-tunas-aksara', [PlaygroupController::class, 'index'])->name('playgroup.index');

    Route::get('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'create'])->name('playgroup.create');
    Route::post('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'store'])->name('playgroup.store');

    Route::get('/kb-tunas-aksara/{student:username}', [PlaygroupController::class, 'show'])->name('playgroup.show');

    Route::get('/kb-tunas-aksara/{student:username}/edit', [PlaygroupController::class, 'edit'])->name('playgroup.edit');
    Route::post('/kb-tunas-aksara/{student:username}', [PlaygroupController::class, 'update'])->name('playgroup.update');

    Route::get('/kb-tunas-aksara/delete/{id}', [PlaygroupController::class, 'destroy'])->name('playgroup.destroy');
    // END :: KB Tunas Aksara



    // START :: TK Tunas Aksara
    Route::get('/tk-tunas-aksara', [KindergartenController::class, 'index'])->name('kindergarten.index');

    Route::get('/tk-tunas-aksara/tambah-data-peserta-didik', [KindergartenController::class, 'create'])->name('kindergarten.create');
    Route::post('/tk-tunas-aksara/tambah-data-peserta-didik', [KindergartenController::class, 'store'])->name('kindergarten.store');

    Route::get('/tk-tunas-aksara/{student:username}', [KindergartenController::class, 'show'])->name('kindergarten.show');

    Route::get('/tk-tunas-aksara/{student:id}/edit', [KindergartenController::class, 'edit'])->name('kindergarten.edit');
    Route::post('/tk-tunas-aksara/{student:id}', [KindergartenController::class, 'update'])->name('kindergarten.update');

    Route::get('/tk-tunas-aksara/delete/{id}', [KindergartenController::class, 'destroy'])->name('kindergarten.destroy');
    // END :: TK Tunas Aksara


    // START :: Nilai Raport
    Route::get('/nilai-raport/{student:username}', [RaportController::class, 'show'])->name('raport.show');

    Route::get('/tambah-nilai-raport/{student:username}/create', [RaportController::class, 'create'])->name('raport.create');
    Route::post('/tambah-nilai-raport/{student:username}/create', [RaportController::class, 'store'])->name('raport.store');

    Route::get('/nilai-raport/semester-1/{student:username}/edit', [RaportController::class, 'editSemester1'])->name('raport.editSemester1');
    Route::post('/nilai-raport/semester-1/{student:username}', [RaportController::class, 'updateSemester1'])->name('raport.updateSemester1');

    Route::get('/nilai-raport/semester-2/{student:username}/edit', [RaportController::class, 'editSemester2'])->name('raport.editSemester2');
    Route::post('/nilai-raport/semester-2/{student:username}', [RaportController::class, 'updateSemester2'])->name('raport.updateSemester2');

    Route::get('/nilai-raport/semester-3/{student:username}/edit', [RaportController::class, 'editSemester3'])->name('raport.editSemester3');
    Route::post('/nilai-raport/semester-3/{student:username}', [RaportController::class, 'updateSemester3'])->name('raport.updateSemester3');

    Route::get('/nilai-raport/semester-4/{student:username}/edit', [RaportController::class, 'editSemester4'])->name('raport.editSemester4');
    Route::post('/nilai-raport/semester-4/{student:username}', [RaportController::class, 'updateSemester4'])->name('raport.updateSemester4');

    Route::get('/nilai-raport/semester-5/{student:username}/edit', [RaportController::class, 'editSemester5'])->name('raport.editSemester5');
    Route::post('/nilai-raport/semester-5/{student:username}', [RaportController::class, 'updateSemester5'])->name('raport.updateSemester5');

    Route::get('/nilai-raport/semester-6/{student:username}/edit', [RaportController::class, 'editSemester6'])->name('raport.editSemester6');
    Route::post('/nilai-raport/semester-6/{student:username}', [RaportController::class, 'updateSemester6'])->name('raport.updateSemester6');

    Route::get('/nilai-raport/semester-7/{student:username}/edit', [RaportController::class, 'editSemester7'])->name('raport.editSemester7');
    Route::post('/nilai-raport/semester-7/{student:username}', [RaportController::class, 'updateSemester7'])->name('raport.updateSemester7');

    Route::get('/nilai-raport/semester-8/{student:username}/edit', [RaportController::class, 'editSemester8'])->name('raport.editSemester8');
    Route::post('/nilai-raport/semester-8/{student:username}', [RaportController::class, 'updateSemester8'])->name('raport.updateSemester8');

    Route::get('/nilai-raport/delete/{id}', [RaportController::class, 'destroy'])->name('raport.destroy');
    // END :: Nilai Raport


    // START :: Teacher
    Route::get('/tenaga-pendidik', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/tenaga-pendidik/{user:username}', [TeacherController::class, 'show'])->name('teacher.show');

    Route::get('/tambah-tenaga-pendidik', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/tambah-tenaga-pendidik', [TeacherController::class, 'store'])->name('teacher.store');

    Route::get('/tenaga-pendidik/{user:username}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/tenaga-pendidik/{user:username}', [TeacherController::class, 'update'])->name('teacher.update');

    Route::get('/tenaga-pendidik/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    // END :: Teacher


    // START :: Forum PAUD
    // ==== Categories
    Route::get('/forum-paud/categories', [PostCategoryController::class, 'index'])->name('categories.index');
    Route::get('/forum-paud/category/create', [PostCategoryController::class, 'create'])->name('categories.create');
    Route::post('/forum-paud/category/create', [PostCategoryController::class, 'store'])->name('categories.store');

    Route::get('/forum-paud/category/{post_category:slug}/edit', [PostCategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/forum-paud/category/{post_category:slug}', [PostCategoryController::class, 'update'])->name('categories.update');

    Route::get('/forum-paud/categories/delete/{id}', [PostCategoryController::class, 'destroy'])->name('categories.destroy');


    // ==== Posts
    Route::get('/forum-paud', [PostController::class, 'index'])->name('posts.index');

    Route::get('/forum-paud/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/forum-paud/create', [PostController::class, 'store'])->name('posts.store');

    Route::get('/forum-paud/{post:slug}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/forum-paud/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/forum-paud/{post:slug}', [PostController::class, 'update'])->name('posts.update');

    Route::get('/forum-paud/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/forum-paud/comment/{post:id}', [PostController::class, 'comment'])->name('posts.comment');
    // END :: Forum PAUD


    // START :: Management Surat
    // ==== Kategori Surat
    Route::get('/manajemen-surat/categories', [LetterCategoryController::class, 'index'])->name('letter.category.index');

    Route::get('/manajemen-surat/kategori/create', [LetterCategoryController::class, 'create'])->name('letter.category.create');
    Route::post('/manajemen-surat/kategori/create', [LetterCategoryController::class, 'store'])->name('letter.category.store');

    Route::get('/manajemen-surat/kategori/{letter_category:slug}/edit', [LetterCategoryController::class, 'edit'])->name('letter.category.edit');
    Route::post('/manajemen-surat/kategori/{letter_category:slug}', [LetterCategoryController::class, 'update'])->name('letter.category.update');

    Route::get('/management-surat/delete/{id}', [LetterCategoryController::class, 'destroy'])->name('letter.category.destroy');


    // ==== Surat Masuk
    Route::get('/manajemen-surat/surat-masuk', [LetterController::class, 'index'])->name('incoming.letter.index');
    Route::get('/manajemen-surat/surat-keluar', [LetterController::class, 'indexOutLetter'])->name('out.letter.index');

    Route::get('/manajemen-surat/create', [LetterController::class, 'create'])->name('incoming.letter.create');
    Route::post('/manajemen-surat/create', [LetterController::class, 'store'])->name('incoming.letter.store');

    Route::get('/manajemen-surat/{letter:id}/edit', [LetterController::class, 'edit'])->name('letter.edit');
    Route::post('/manajemen-surat/{letter:id}', [LetterController::class, 'update'])->name('letter.update');

    Route::get('/manajemen-surat/tampilkan-surat/{letter:id}', [LetterController::class, 'show'])->name('letter.show');
    Route::get('/manajemen-surat/delete/{id}', [LetterController::class, 'destroy'])->name('letter.destroy');

    // END :: Management Surat
});



// START :: Profil Tenaga Pendidik
Route::get('/profil/{user:username}', [Controller::class, 'profile'])->name('profile');
// END :: Profil Tenaga Pendidik




require __DIR__ . '/auth.php';
