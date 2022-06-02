<?php

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Administrator\PostController;
use App\Http\Controllers\Administrator\TeacherController;
use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\FeedbackController;
use App\Http\Controllers\Administrator\PlaygroupController;

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

    Route::get('/tambah-tenaga-pendidik', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/tambah-tenaga-pendidik', [TeacherController::class, 'store'])->name('teacher.store');

    Route::get('/tenaga-pendidik/{user:id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/tenaga-pendidik/{user:id}', [TeacherController::class, 'update'])->name('teacher.update');

    Route::get('/tenaga-pendidik/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    // END :: Teacher



    // START :: Forum PAUD
    // ==== Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/categories/{category:id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/{category:id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


    // ==== Posts
    // Route::resource('/posts', PostController::class);
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/posts/{post:id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{post:id}', [PostController::class, 'update'])->name('posts.update');

    Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/comment/{post:id}', [PostController::class, 'comment'])->name('posts.comment');
    // END :: Forum PAUD
});






require __DIR__ . '/auth.php';
