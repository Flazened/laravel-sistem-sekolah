<?php

use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\CreateController;
use App\Http\Controllers\Teacher\DestroyController;
use App\Http\Controllers\Teacher\EditController;
use App\Http\Controllers\Teacher\IndexController;
use App\Http\Controllers\Teacher\ShowController;
use App\Http\Controllers\Teacher\StoreController;
use App\Http\Controllers\Teacher\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Manajemen Data Siswa(Action)
Route::name('students.')->prefix('students')->group(function(){


// Halaman Dafatar Siswa
Route::get('/', [StudentController::class, 'index'])->name('index');

// Halaman Detail Siswa
Route::get('/{id}',[StudentController::class, 'show'])->name('show');

//Halaman Tambah Siswa
Route::get('/create',[StudentController::class, 'create'])->name('create');

//Halaman Edit Siswa
Route::get('/{id}/edit',[StudentController::class, 'edit'])->name('edit');

//Logika Tambah Siswa
Route::post('',[StudentController::class, 'store'])->name('store');

//Logika Edit Siswa
Route::put('/{id}',[StudentController::class, 'update'])->name('update');

//Logika Menghapus Siswa
Route::delete('/{id}',[StudentController::class, 'destroy'])->name('destroy');

});

//Manajamen Data Guru
Route::get('/', function () {
    return view('welcome');
});

//Manajemen Data Siswa(Action)
Route::name('teachers.')->prefix('teachers')->group(function(){


// Halaman Daftar Teacher
Route::get('/', IndexController::class)->name('index');

// Halaman Detail Teacher
Route::get('/{id}', ShowController::class)->name('show');

//Halaman Tambah Teacher
Route::get('/create', CreateController::class)->name('create');

//Halaman Edit Teacher
Route::get('/{id}/edit',EditController::class)->name('edit');

//Logika Tambah Teacher
Route::post('', StoreController::class)->name('store');

//Logika Edit Teacher
Route::put('/{id}',UpdateController::class)->name('update');

//Logika Menghapus Teacher
Route::delete('/{id}',DestroyController::class)->name('destroy');

});


// Manajemen Data Kelas (Resource)
Route::resource('classes', SchoolClassController::class);