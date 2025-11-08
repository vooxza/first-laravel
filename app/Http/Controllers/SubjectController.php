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
}