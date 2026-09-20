<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Manajemen Data Siswa(Action)
Route::name('students.')->prefix('students')->group(function(){


// Halaman Dafatar Siswa
Route::get('/', [StudentController::class, 'index'])->name('index');

//Halaman Tambah Siswa
Route::get('/create',[StudentController::class, 'create'])->name('create');

// Halaman Detail Siswa
Route::get('/{id}',[StudentController::class, 'show'])->name('show');

//Halaman Edit Siswa
Route::get('/{id}/edit',[StudentController::class, 'edit'])->name('edit');




//Logika Tambah Siswa
Route::post('/',[StudentController::class, 'store'])->name('store');

//Logika Edit Siswa
Route::put('/{id}',[StudentController::class, 'update'])->name('update');

//Logika Menghapus Siswa
Route::delete('/{id}',[StudentController::class, 'destroy'])->name('destroy');

});





//Manajemen Data Teacher (Action)
Route::name('teachers.')->prefix('teachers')->group(function(){


// Halaman Daftar Teacher
Route::get('/', [TeacherController::class, 'index'])->name('index');

//Halaman Tambah Teacher
Route::get('/create',[TeacherController::class, 'create'])->name('create');

// Halaman Detail Teacher
Route::get('/{id}',[TeacherController::class, 'show'])->name('show');

//Halaman Edit Teacher
Route::get('/{id}/edit',[TeacherController::class, 'edit'])->name('edit');



//Logika Tambah Teacher
Route::post('/',[TeacherController::class, 'store'])->name('store');

//Logika Edit Teacher
Route::put('/{id}',[TeacherController::class, 'update'])->name('update');

//Logika Menghapus Teacher
Route::delete('/{id}',[TeacherController::class, 'destroy'])->name('destroy');

});





//Manajemen Data SchoolClass (Invokable)
Route::name('classes.')->prefix('classes')->group(function(){


// Halaman Daftar SchoolClass
Route::get('/', IndexController::class )->name('index');

//Halaman Tambah SchoolClass
Route::get('/create', CreateController::class)->name('create');

// Halaman Detail SchoolClass
Route::get('/{id}', ShowController::class)->name('show');

//Halaman Edit SchoolClass
Route::get('/{id}/edit', EditController::class)->name('edit');





//Logika Tambah SchoolClass
Route::post('/', StoreController::class)->name('store');

//Logika Edit SchoolClass
Route::put('/{id}', UpdateController::class)->name('update');

//Logika Menghapus SchoolClass
Route::delete('/{id}', DestroyController::class)->name('destroy');

});



//Manajemen Data Major (Resources)
Route::resource('major', MajorController::class);


