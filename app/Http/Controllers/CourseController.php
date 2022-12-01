<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\SubjectCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function list($subjectId = null, $subjectCetegoryId = null)
    {
      $courses = Course::with('subject', 'subjectCategory')->paginate(6);

      return view('courses', [
        'courses' => $courses,
        'subject' => $subjectId,
        'category' => $subjectCetegoryId,
      ]);
    }

    public function show(Course $course)
    {
      $course = $course
      ->with('subject', 'subjectCategory')
      ->first();

      dd($course);

        return view('courses.show', [
          'course' => $course
        ]);
    }

    public function filter($id = null, $type = null)
    {
      $courses = Course::with('subject', 'subjectCategory');

      if($id != null) {
        if ($type == 'subjectCategory') {
          $courses = $courses->where('subject_category_id', $id);
        }
        if ($type == 'subject') {
          $courses = $courses->where('subject_id', $id);
        }
      }

      $courses = $courses->paginate(6);

      return view('courses', [
        'courses' => $courses
      ]);
    }

    public function search(Request $request)
    {
      $searchCourses = Course::where([
        ['name', '!=', Null],
        ['description', '!=', Null],
        [function ($query) use ($request) {
            if (($keywords = $request->keywords)) {
              $query->orWhere('name', 'LIKE', '%' . $keywords . '%')
                ->orWhere('description', 'LIKE', '%' . $keywords . '%')
                ->get();
            }
        }]
      ])->paginate(6);

      return view('courses', [
        'courses' => $searchCourses
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

    public function destroy(Course $course)
    {
        //
    }
  }
