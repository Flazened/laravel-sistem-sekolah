<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'Sistem Sekolah - Daftar Kelas';
        $classes = Classes::select(['id', 'name', 'grade', 'major', 'homeroom_teacher'])->get();


        return view('classes.index', [
            'title' => $title,
            'classes' => $classes
        ]);
    }
}
