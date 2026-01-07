<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all(); 
        return view('subject', [
            'title' => 'Subject', 
            'subject' => $subject
        ]);
    }
    public function adminIndex()
    {
        $subject = Subject::all();

        // Mengarah ke resources/views/admin/subject.blade.php
        return view('components.admin.subject', [ 
            'title' => 'Data mata pelajaran (Admin)',
            'subject' => $subject
        ]);
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'teacher_id' => 'nullable|exists:teachers,id'
    ]);

    $subject = Subject::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    if ($request->teacher_id) {
        $subject->teachers()->attach($request->teacher_id);
    }

    return redirect()->route('subject.index')->with('success', 'Subject added!');
}
}
