<?php

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
Route::get('/kb-tunas-aksara/profile', [PlaygroupController::class, 'show'])->name('playgroup.show');


Route::get('/dashboard', function () {
    return view('dashboard');
});
// });






require __DIR__ . '/auth.php';
