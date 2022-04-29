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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Route::middleware(['auth'])->group(function () {

// KB Tunas Aksara
Route::get('/kb-tunas-aksara', [PlaygroupController::class, 'index'])->name('playgroup.index');
Route::get('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'create'])->name('playgroup.create');

Route::post('/kb-tunas-aksara/tambah-data-peserta-didik', [PlaygroupController::class, 'store'])->name('playgroup.store');

Route::get('/kb-tunas-aksara/profil', [PlaygroupController::class, 'show'])->name('playgroup.show');
Route::get('/kb-tunas-aksara/profil/edit', [PlaygroupController::class, 'edit'])->name('playgroup.edit');

// Parent Controller
Route::get('/kb-tunas-aksara/tambah-data-ayah', [ParentController::class, 'create'])->name('parent.create');




Route::get('/dashboard', function () {
    return view('dashboard');
});
// });






require __DIR__ . '/auth.php';
