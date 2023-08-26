<?php

use App\Models\Jenis;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\KecamatanController;

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
    return view('frontend.home');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('maps', [HomeController::class, 'maps'])->name('maps');
Route::get('klastering', [HomeController::class, 'klastering'])->name('klastering');
Route::post('hasil', [HomeController::class, 'hasil'])->name('hasil');
Route::get('metode', [HomeController::class, 'metode'])->name('metode');
Route::get('author', [HomeController::class, 'author'])->name('author');
Route::get('bantuan', [HomeController::class, 'bantuan'])->name('bantuan');

// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('home');
//     Route::resource('jenis', JenisController::class);
//     Route::resource('kecamatan', KecamatanController::class);
//     Route::resource('dataset', DatasetController::class);
// });

Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('home');
        Route::resource('jenis', JenisController::class);
        Route::resource('kecamatan', KecamatanController::class);
        Route::resource('dataset', DatasetController::class);
        Route::get('/dataset/{id}/kecamatan', [DatasetController::class, 'data'])->name('dataset.data');
        Route::get('/dataset/{id}/kecamatan/create', [DatasetController::class, 'create'])->name('dataset.create');
        Route::post('/dataset/{id}/kecamatan', [DatasetController::class, 'store'])->name('dataset.store');
        Route::get('/dataset/{id}/kecamatan/{data_id}/edit', [DatasetController::class, 'edit'])->name('dataset.edit');
        Route::put('/dataset/{id}/kecamatan/{data_id}', [DatasetController::class, 'update'])->name('dataset.update');
        Route::delete('/dataset/{id}/kecamatan/{id}', [DatasetController::class, 'destroy'])->name('dataset.destroy');
    });
});


// Route::get('/user', [HomeController::class, 'index'])->name('user');
