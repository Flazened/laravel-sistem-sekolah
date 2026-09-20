<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Jurusan';
        $majors = [ 
             [
                 'id' => 1,
                 'code' => 'AKL',
                 'name' => 'Akuntansi dan Keuangan Lembaga',
                 'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
             ],
             [
                 'id' => 2,
                 'code' => 'TKJ',
                 'name' => 'Teknik Komputer dan Jaringan',
                 'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
             ], 
             [ 
                 'id' => 3,
                 'code' => 'BD',
                 'name' => 'Bisnis Digital',
                 'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
             ],
        ];
        return "Ini Adalah Halaman Major";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Sistem Sekolah - Buat Jurusan';
        return "Ini adalah halaman create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Menyimpan data major";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Menampilkan daftar Major dengan ID: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Halaman Edit Major dengan ID: {$id}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Mengubah data major dengan ID: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Menghapus data major dengan ID: {$id}";
    }
}
