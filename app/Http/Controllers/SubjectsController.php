<?php


namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully');
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
    }
}
