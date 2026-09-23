<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
        // ->where('name', '=', 'Spotify-Tui') // Mencari 
        ->get();
        
        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function show(Student $student) 
    {
        
        $title = 'Sistem Sekolah - Detail Siswa';
        // $student = Student::find($id); // Menemukan
        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
    }


    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        return view('students.edit', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validatedRequest = $request->validated();

        // // Menambahkan Data Ke Database
        // $student = new Student();
        // $student->nis =  $request->nis;
        // $student->name=  $request->name;
        // $student->gender =  $request->gender;
        // $student->major =  $request->major;
        // $student->class =  $request->class;
        // $student->save();

        //Tambahkan Data Ke Database Eloquent
        Student::create($validatedRequest);

        // Handle If Success
        return redirect()->route('students.index');
    }

    public function update(Student $student, UpdateRequest $request)
    {   
        $validatedRequest = $request->validated();

        // Update Data
        $student->update($validatedRequest);

        //Handle If Success
        return redirect()->route('students.index');
    }

    public function destroy(student $student)
    {
        //Delete Data
        $student->delete();

        //Handle If Succes
        return redirect()->route('students.index');
    }
}
