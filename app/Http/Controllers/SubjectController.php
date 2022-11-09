<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
      $getSubjects = Subject::orderBy('created_at', 'desc')->get();

      return view('settings.subjects.index', [
        'subjects' => $getSubjects
      ]);
    }

    public function create()
    {
      return view('settings.subjects.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'subject_name' => ['required', 'string', 'max:255']
      ]);
      
      Subject::create([
        'name' => $request->subject_name,
      ]);

      return redirect()->route('subject-categories.index')->with('success','New Subject has been created successfully.');
    }

    public function show(Subject $subject)
    {
        //
    }

    public function edit(Subject $subject)
    {
        //
    }


    public function update(Request $request, Subject $subject)
    {
        //
    }

    public function destroy(Subject $subject)
    {
        //
    }
}
