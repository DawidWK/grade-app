<?php


namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GradesController extends Controller
{
    public function index()
    {
        $grades = Grade::with('user', 'subject')->get();
        $gradesGroupedByUser = $grades->groupBy('user_id');
        return view('grades.index', compact('gradesGroupedByUser'));
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

    public function user()
    {
        $loggedInUserId = Auth::id(); 
    
        $gradesGroupedByUser = Grade::with('user')
            ->where('user_id', $loggedInUserId) 
            ->get()
            ->groupBy('user_id');
    
        return view('grades.user', compact('gradesGroupedByUser'));
    }
    

}
