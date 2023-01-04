<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubjectCategory;
use App\Models\Subject;
use App\Models\CourseSubject;
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
      )->paginate(6);

      if(auth()->user()) {
        $page = 'courses.index';
      } else {
        $page = 'courses.index-guest';
      }

      return view($page, [
        'courses' => $searchCourses->appends(['keywords' => $keywords]),
        'keywords' => $keywords
      ]);
    }

    public function show(Course $course)
    {
      Session::put('enrol_course_id', $course->id);

      return view('courses.show', [
        'course' => $course->first()
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
      return view('settings.courses.create', [
        'categories' => SubjectCategory::orderBy('name', 'asc')->pluck('id','name'),
        'subjects' => Subject::orderBy('name', 'asc')->pluck('id', 'name'),
      ]);
    }


    public function store(Request $request)
    {
      $request->validate([
        'course_name' => ['required', 'string', 'max:255'],
        'course_description' => ['required', 'string', 'max:255'],
        'course_subject_category' => ['required'],
        'course_subjects' => ['required'],
        'course_monthly_fee' => ['required'],
      ]);

      $course = Course::create([
        'name' => $request->course_name,
        'slug' => $request->course_name,
        'description' => $request->course_description,
        'subject_category_id' => $request->course_subject_category,
        'monthly_fee' => $request->course_monthly_fee,
      ]);

      foreach($request->course_subjects as $subject) {
        CourseSubject::create([
          'course_id' => $course->id,
          'subject_id' => $subject,
        ]);
      }

      return redirect()->route('courses.index')->with('success','New course ' . $request->course_name .' has been created successfully.');
    }


    public function edit(Course $course)
    {
      return view('settings.courses.edit', [
        'course' => $course,
        'categories' => SubjectCategory::orderBy('name', 'asc')->pluck('id','name'),
        'subjects' => Subject::orderBy('name', 'asc')->pluck('id', 'name'),
        'selectedSubjects' => $course->courseSubjects()->pluck('subject_id')->toArray()
      ]);
    }


    public function update(Request $request, Course $course)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'subject_category_id' => ['required'],
        'course_subjects' => ['required'],
      ]);

      $course->fill($request->post())->save();

      $selectedSubjects = $request->course_subjects;
      $existingSubjects = $course->courseSubjects()->pluck('subject_id')->toArray();

      //add new selected subjects
      foreach($selectedSubjects as $subject) {
        if(!in_array($subject, $existingSubjects)) {
          CourseSubject::create([
            'course_id' => $course->id,
            'subject_id' => $subject,
          ]);
        }
      }

      //remove unselected subjects
      foreach($existingSubjects as $subject) {
        if(!in_array($subject, $selectedSubjects)) {
          CourseSubject::where('course_id', $course->id)
            ->where('subject_id', $subject)
            ->firstorfail()->delete();
        }
      }

      return redirect()->route('courses.index')->with('success','Course ' . $course->name .' has been updated successfully.');
    }
  }
