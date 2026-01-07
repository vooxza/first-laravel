<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminClassroomController extends Controller
{
    public function adminIndex()
    {
        $classroom = Classroom::selectRaw('MIN(id) AS id, name')
            ->groupBy('name')
            ->orderBy('name')
            ->get();

        return view('components.admin.classroom', [
            'title' => 'Classroom List',
            'classroom' => $classroom
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Classroom::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Classroom added successfully!');
    }    

}