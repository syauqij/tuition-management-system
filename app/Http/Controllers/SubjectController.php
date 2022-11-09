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

      return redirect()->route('subjects.index')->with('success','New '. $request->subject_name . ' has been created successfully.');
    }

    public function edit(Subject $subject)
    {
      return view('settings.subjects.edit',compact('subject'));
    }


    public function update(Request $request, Subject $subject)
    {
      $request->validate([
        'name' => 'required',
      ]);
      
      $subject->fill($request->post())->save();

      return redirect()->route('subjects.index')->with('success','Subject ' . $subject->name .' has been updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        //
    }
}
