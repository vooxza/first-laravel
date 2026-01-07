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
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
        ]);

        Guardian::create($request->all());

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian added successfully!');
    }
    
    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $guardian->update([
            'name' => $request->name,
            'job' => $request->job,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Guardian updated successfully.');
    }

    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();

        return redirect()->route('admin.guardian.index')->with('success', 'Guardian deleted successfully.');
    }
}