<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\SubjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function list($id = null, $type = null, $name = null)
    {
      $getCourses = Course::with('subjectCategory');

      if($id != null) {
        if ($type == 'subjectCategory') {
          $getCourses->where('subject_category_id', $id);
        }
      }

      $courses = $getCourses->paginate(6);

      if (auth()->user()) {
        $page = 'courses.index';
      } else {
        $page = 'courses.index-guest';
      }

      return view($page, [
        'courses' => $courses,
        'keywords' => $name
      ]);
    }

    public function search(Request $request)
    {
      $keywords = $request->keywords;

      $searchCourses = Course::where(
        'name', 'like', '%' . $keywords . '%'
      )->orWhereRelation(
          'subjectCategory', 'name', 'like', '%' . $keywords . '%'
      )->orWhereRelation(
          'subject', 'name', 'like', '%' . $keywords . '%'
      )->paginate(6);

      $courses = $searchCourses
          ->appends(['keywords' => $keywords]);

      if(auth()->user()) {
        $page = 'courses.index';
      } else {
        $page = 'courses.index-guest';
      }

      return view($page, [
        'courses' => $courses,
        'keywords' => $keywords
      ]);
    }

    public function show(Course $course)
    {
      $course = $course->first();

      Session::put('enrol_course_id', $course->id);

      return view('courses.show', [
        'course' => $course
      ]);
    }

    public function index()
    {
      $getCourses = Course::orderBy('created_at', 'desc')->get();

      return view('settings.courses.index', [
        'courses' => $getCourses
      ]);
    }

    public function create()
    {
      $getSubjectCategories = SubjectCategory::orderBy('name', 'asc')->pluck('id','name');
      $getSubjects = Subject::orderBy('name', 'asc')->pluck('id', 'name');

      return view('settings.courses.create', [
        'categories' => $getSubjectCategories,
        'subjects' => $getSubjects,
      ]);
    }


    public function store(Request $request)
    {
      $request->validate([
        'course_name' => ['required', 'string', 'max:255'],
        'course_description' => ['required', 'string', 'max:255'],
        'course_subject_category' => ['required'],
        'course_subject' => ['required'],
      ]);

      Course::create([
        'name' => $request->course_name,
        'slug' => $request->course_name,
        'description' => $request->course_description,
        'subject_category_id' => $request->course_subject_category,
        'subject_id' => $request->course_subject
      ]);

      return redirect()->route('courses.index')->with('success','New course ' . $request->course_name .' has been created successfully.');
    }


    public function edit(Course $course)
    {
      $getSubjectCategories = SubjectCategory::orderBy('name', 'asc')->pluck('id','name');
      $getSubjects = Subject::orderBy('name', 'asc')->pluck('id', 'name');

      return view('settings.courses.edit', [
        'categories' => $getSubjectCategories,
        'subjects' => $getSubjects,
        'course' => $course
      ]);
    }


    public function update(Request $request, Course $course)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'subject_category_id' => ['required'],
        'subject_id' => ['required'],
      ]);

      $course->fill($request->post())->save();

      return redirect()->route('courses.index')->with('success','Course ' . $course->name .' has been updated successfully.');
    }
  }
