<?php


namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
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
        $subjects = Subject::all();
        $users = User::all();
        return view('grades.create', compact('subjects', 'users'));
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
        $subjects = Subject::all();
        $users = User::all();
        return view('grades.edit', compact('grade', 'subjects', 'users'));
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

    public function user($id)
    {
        // Pobierz bieżącego użytkownika
        $user = User::findOrFail($id);

        // Pobierz oceny użytkownika i pogrupuj je według przedmiotu
        $grades = Grade::where('user_id', $id)->get()
            ->groupBy('subject_id')
            ->map(function ($items) {
                $subjectName = $items[0]->subject->name; 
                return [
                    'subject' => $subjectName,
                    'grades' => $items->pluck('grade') 
                ];
            })
            ->values();

        return view('grades.user', compact('grades', 'user'));
    }

}
