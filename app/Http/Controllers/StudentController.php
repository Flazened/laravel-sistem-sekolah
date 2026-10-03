<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Major;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::with(['major', 'schoolclass'])
            ->select(['id', 'nis', 'name', 'class_id', 'major_id'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($class, fn ($query, $class) => $query->where('class_id', '=', $class))
            ->when($major, fn ($query, $major) => $query->where('major_id', '=', $major))
            ->paginate(10)
            ->withQueryString();

        $classes = SchoolClass::orderBy('name')->get();
        $majors = Major::orderBy('name')->get();

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'classes' => $classes,
            'majors' => $majors,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';
        $classes = SchoolClass::orderBy('name')->get();
        $majors = Major::orderBy('name')->get();

        return view('students.create', [
            'title' => $title,
            'classes' => $classes,
            'majors' => $majors,
        ]);
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        $student->load(['major', 'schoolclass']);

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        $classes = SchoolClass::orderBy('name')->get();
        $majors = Major::orderBy('name')->get();

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
            'classes' => $classes,
            'majors' => $majors,
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

        // Hubungkan user_id jika user yang login adalah student dan belum memiliki data siswa
        if (auth()->check() && auth()->user()->role === 'student' && ! auth()->user()->student) {
            $validatedRequest['user_id'] = auth()->id();
        }

        // Tambahkan Data Ke Database Eloquent
        Student::create($validatedRequest);

        // Handle If Success
        return redirect()->route('students.index');
    }

    public function update(Student $student, UpdateRequest $request)
    {
        $validatedRequest = $request->validated();

        // Update Data
        $student->update($validatedRequest);

        // Handle If Success
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        // Delete Data
        $student->delete();

        // Handle If Succes
        return redirect()->route('students.index');
    }
}
