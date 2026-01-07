<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        $subjects = Subject::doesntHave('teachers')->get();

        return view('components.admin.teacher', [
            'title' => 'Teacher List',
            'teacher' => $teachers,
            'subject' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        if (Teacher::where('subject_id', $request->subject_id)->exists()) {
            return back()
                ->with('error', 'Subject ini sudah diajar oleh guru lain!')
                ->withInput();
        }

        Teacher::create([
            'name' => $request->name,
            'subject_id' => $request->subject_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.teacher.index')
            ->with('success', 'Teacher berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $isUsedByOther = Teacher::where('subject_id', $request->subject_id)
            ->where('id', '!=', $teacher->id)
            ->exists();

        if ($isUsedByOther) {
            return back()
                ->with('error', 'Subject ini sudah diajar oleh guru lain!')
                ->withInput();
        }

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject_id' => $request->subject_id,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.teacher.index')
            ->with('success', 'Teacher berhasil diupdate!');
    }


    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}