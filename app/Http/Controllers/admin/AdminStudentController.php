<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminStudentController extends Controller
{
    public function index()
{
    $students = Student::with('classroom')->get();

    $classrooms = Classroom::selectRaw('MIN(id) AS id, name')
        ->groupBy('name')
        ->orderBy('name')
        ->get();

    return view('components.admin.student', [
        'title' => 'Data Students',
        'students' => $students,
        'classrooms' => $classrooms
    ]);
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
            'birthday' => 'required|date',
        ]);

        Student::create($validated);

        return redirect()->route('admin.student.index')->with('success', 'Student berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'classroom_id' => $request->classroom_id,
            'birthday' => $request->birthday
        ]);

        return redirect()->back()->with('success', 'Student updated!');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->back()->with('success', 'Student deleted!');
    }

}