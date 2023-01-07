<?php

namespace App\Http\Controllers;

use App\Models\SchoolGrade;
use Illuminate\Http\Request;

class SchoolGradeController extends Controller
{
    public function index()
    {
      $grades = SchoolGrade::orderBy('created_at', 'desc')->get();

      return view('settings.schoolGrades.index', compact('grades'));
    }

    public function create()
    {
      return view('settings.schoolGrades.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:50|unique:school_grades,name',
        'group' => 'required|string|max:100'
      ]);

      SchoolGrade::create([
        'name' => $request->name,
        'group' => $request->group,
      ]);

      return redirect()->route('school-grades.index')
        ->with('success','New school grade ' . $request->name .' has been created successfully.');
    }

    public function edit(SchoolGrade $schoolGrade)
    {
      return view('settings.schoolGrades.edit', compact('schoolGrade'));
    }

    public function update(Request $request, SchoolGrade $schoolGrade)
    {
      $request->validate([
        'name' => 'required|string|max:50|unique:school_grades,name,'.$schoolGrade->id,
        'group' => 'required|string|max:100'
      ]);

      $schoolGrade->fill($request->post())->save();

      return redirect()->route('school-grades.index')
        ->with('success','School grade ' . $schoolGrade->name .' has been updated successfully.');
    }
}
