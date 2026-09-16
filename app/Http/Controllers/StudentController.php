<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return "ini adalah halaman daftar siswa";
    }

    public function show(string $id) 
    {
        return "menampilan detail siswa dengan: {$id}";
    }

    public function create()
    {
        return "Ini adalah halaman tambah siswa";
    }

    public function edit(string $id)
    {
        return "Ini adalah halaman edit siswa dengan id: {$id}";
    }

    public function store()
    {
        return "Menambah data siswa baru";
    }

    public function update(string $id)
    {
        return "Mengubah data siswa dengan id: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa dengan id: {$id}";
    }
}
