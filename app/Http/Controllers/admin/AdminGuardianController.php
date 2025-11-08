<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index()
    {
        $guardian = Guardian::all();

        return view('components.admin.guardian', [
            'title' => 'Guardian List',
            'guardian' => $guardian
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'email' => 'required|email|unique:guardians,email',
            'address' => 'required|string|max:255',
        ]);

        Guardian::create($request->all());

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian added successfully!');
    }
}