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

        return view('components.admin.teacher', [
            'title' => 'Teacher List',
            'teacher' => $teachers
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subject_name' => 'required',
            'subject_description' => 'nullable',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // 1️⃣ Buat subject dulu
        $subject = Subject::create([
            'name' => $request->subject_name,
            'description' => $request->subject_description ?? 'Belum ada deskripsi',
        ]);

        // 2️⃣ Buat teacher dan isi subject_id dari subject yang baru dibuat
        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'subject_id' => $subject->id,
        ]);

        // ✅ Tidak perlu buat Subject kedua atau pakai save()
        // Relasi sudah otomatis terhubung lewat subject_id

        return redirect()->back()->with('success', 'Teacher dan Subject berhasil ditambahkan!');
    }
}