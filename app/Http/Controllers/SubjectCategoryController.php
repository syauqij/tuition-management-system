<?php

namespace App\Http\Controllers;

use App\Models\SubjectCategory;
use Illuminate\Http\Request;

class SubjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
      $getCategories = SubjectCategory::orderBy('created_at', 'desc')->get();

      return view('settings.subjectCategories.index', [
        'subjectCategories' => $getCategories
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectCategory $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectCategory $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectCategory $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectCategory $id)
    {
        //
    }
}
