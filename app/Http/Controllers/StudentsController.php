<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        return view('studentLists', compact('students'));
    }

    public function newStd(Request $request)
    {
        $request->validate([
            'stdName' => 'required|max:255',
            'stdAge' => 'required|integer',
            'stdGender' => 'nullable|string',
        ]);

        Students::create([
            'name' => $request->stdName,
            'age' => $request->stdAge,
            'gender' => $request->stdGender,
        ]);

        return redirect()->route('std.index')->with('success', 'Student created successfully.');
    }

    public function editStd($id)
    {
        $student = Students::findOrFail($id);
        return view('editStudent', compact('student'));
    }

    public function updateStd(Request $request, $id)
    {
        $request->validate([
            'stdName' => 'required|max:255',
            'stdAge' => 'required|integer',
            'stdGender' => 'nullable|string',
        ]);

        $student = Students::findOrFail($id);
        $student->update([
            'name' => $request->stdName,
            'age' => $request->stdAge,
            'gender' => $request->stdGender,
        ]);

        return redirect()->route('std.index')->with('success', 'Student updated successfully.');
    }

    public function deleteStd($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();

        return redirect()->route('std.index')->with('success', 'Student deleted successfully.');
    }
}
