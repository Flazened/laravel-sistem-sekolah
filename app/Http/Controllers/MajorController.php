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
        return "Ini Adalah Halaman Major";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
