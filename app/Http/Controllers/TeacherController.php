<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        return "ini adalah halaman daftar guru";
    }

    public function show(string $id) 
    {
        return "menampilan detail guru dengan: {$id}";
    }

    public function create()
    {
        return "Ini adalah halaman tambah guru";
    }

    public function edit(string $id)
    {
        return "Ini adalah halaman edit guru dengan id: {$id}";
    }

    public function store()
    {
        return "Menambah data guru baru";
    }

    public function update(string $id)
    {
        return "Mengubah data guru dengan id: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data guru dengan id: {$id}";
    }

}
