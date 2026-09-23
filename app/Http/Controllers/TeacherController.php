<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Guru';
        $teachers = Teacher::select(['id','nip', 'name','gender', 'subject', 'phone_number','status'])->get();

        return view('teachers.index', [
            'title' => $title,
            'teachers' => $teachers
            
        ]);
    }

    public function show(Teacher $teacher) 
    {
        $title = 'Sistem Sekolah - Detail Guru';
        return view('teachers.show', [
            'title' => $title
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Guru';
        return view('teachers.create', [
            'title' => $title
        ]);
    }

    public function edit(Teacher $teacher)
    {
        $title = 'Sistem Sekolah - Edit Guru';
        return view('teachers.edit', [
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'nip'=>['required', 'string', 'size:12', 'unique:teachers,nip'],
            'name'=>['required', 'string'],
            'gender'=>['required', 'string', 'in:Laki-laki,Perempuan'],
            'subject'=>['required', 'string'],
            'phone_number'=>['required', 'string', 'size:12'],
            'status'=>['required', 'string', 'in:Aktif,Tidak Aktif']
        ]);


        //Add Data to Database eliquent
        Teacher::create($validatedRequest);

        //Handel If Succes
        return redirect()->route('teachers.index');
    }

    public function update(Teacher $teacher)
    {
        return "Mengubah data guru dengan id: {$teacher}";
    }

    public function destroy(Teacher $teacher)
    {
        return "Menghapus data guru dengan id: {$teacher}";
    }

}
