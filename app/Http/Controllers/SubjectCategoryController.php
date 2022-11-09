<?php

namespace App\Http\Controllers;

use App\Models\SubjectCategory;
use Illuminate\Http\Request;

class SubjectCategoryController extends Controller
{
    public function index()
    { 
      $getCategories = SubjectCategory::orderBy('created_at', 'desc')->get();

      return view('settings.subjectCategories.index', [
        'subjectCategories' => $getCategories
      ]);
    }

    public function create()
    {
      return view('settings.subjectCategories.create');
    }

    public function store(Request $request)
    {        
      $request->validate([
        'category_name' => ['required', 'string', 'max:255']
      ]);
      
      SubjectCategory::create([
        'name' => $request->category_name
      ]);

      return redirect()->route('subject-categories.index')->with('success','New category ' . $request->category_name .' has been created successfully.');

    }

    public function edit(SubjectCategory $subjectCategory)
    {
       
      return view('settings.subjectCategories.edit',compact('subjectCategory'));
    }

    public function update(Request $request, SubjectCategory $subjectCategory)
    {
      $request->validate([
        'name' => 'required',
      ]);
      
      $subjectCategory->fill($request->post())->save();

      return redirect()->route('subject-categories.index')->with('success','Category ' . $subjectCategory->name .' has been updated successfully.');

    }

    public function destroy(SubjectCategory $id)
    {
        //
    }
}
