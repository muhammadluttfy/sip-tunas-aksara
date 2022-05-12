<?php

use App\Http\Controllers\ParentController;
use App\Http\Controllers\PlaygroupController;
use Illuminate\Support\Facades\Route;

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


route::group(['middleware' => ['auth:user,student', 'role:Kepala Sekolah,Administrator,Student']], function () {

    Route::get('/', function () {
        return redirect()->route('login');
    })->middleware('guest:user,student');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // START :: KB Tunas Aksara
    Route::get('/kb-tunas-aksara', [PlaygroupController::class, 'index'])->name('playgroup.index');
    Route::get('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'create'])->name('playgroup.create');

    Route::post('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'store'])->name('playgroup.store');

    Route::get('/kb-tunas-aksara/profil/{student:id}', [PlaygroupController::class, 'show'])->name('playgroup.show');
    Route::get('/kb-tunas-aksara/profil/edit', [PlaygroupController::class, 'edit'])->name('playgroup.edit');
    // END :: KB Tunas Aksara
});






require __DIR__ . '/auth.php';
