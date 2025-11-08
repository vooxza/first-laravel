<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classroom = Classroom::all(); 
        return view('classroom', [
            'title' => 'Classroom', 
            'classroom' => $classroom
        ]);
    }
        public function adminIndex()
    {
        $classroom = Classroom::all();

        // Mengarah ke resources/views/admin/classroom.blade.php
        return view('components.admin.classroom', [ 
            'title' => 'Data Classroom (Admin)',
            'classroom' => $classroom
        ]);
    }
}