<?php


namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        Grade::create($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade created successfully');
    }

    public function show($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.show', compact('grade'));
    }

    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully');
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully');
    }
}
