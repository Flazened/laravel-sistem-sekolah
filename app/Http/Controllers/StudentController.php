<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
        // ->where('name', '=', 'Spotify-Tui') // Mencari 
        // ->get()
        ->when($search, function($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('nis', 'like', "%{$search}%");
            });    
        })
        //     $query->where('class', '=', '$class');
        // })

        ->when($class, fn($query, $search) => $query->where('class', '=', $class))
        ->when($major, fn($query, $search) => $query->where('major', '=', $major))
        ->paginate(10)
        ->withQueryString();

        $classes = ['10 AKL', '11 AKL', '12 AKL', '10 TKJ 1', '10 TKJ 2', '11 TKJ 1', '11 TKJ 2','12 TKJ 1', '12 TKJ 2', '10 BiD', '11 BiD', '12 BiD'];
        $majors = ['AKL', 'BiD', 'TKJ'];
        
        
        
        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'classes' => $classes,
            'majors' => $majors
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
