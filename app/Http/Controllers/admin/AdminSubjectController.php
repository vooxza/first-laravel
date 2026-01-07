<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
class AdminSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $teachers = Teacher::all();

        return view('components.admin.subject', [
            'title' => 'Data mata pelajaran (Admin)',
            'subject' => $subject,
            'teachers' => $teachers
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject = Subject::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->teacher_id) {
            $subject->teachers()->attach($request->teacher_id);
        }

        return redirect()->route('admin.subject.index')->with('success', 'Subject added!');
    }
}
