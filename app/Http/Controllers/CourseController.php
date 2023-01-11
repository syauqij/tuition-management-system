<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubjectCategory;
use App\Models\Subject;
use App\Models\CourseSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
          'subjects', 'name', 'like', '%' . $keywords . '%'
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

    public function show($courseId)
    {
      return view('courses.show', [
        'course' => Course::where('id', $courseId)->first()
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
        'courseTypes' => ['physical', 'home', 'online']
      ]);
    }


    public function store(Request $request)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'subject_category' => ['required'],
        'course_subjects' => ['required'],
        'type' => 'required',
        'monthly_fee' => ['required'],
        'main_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      ]);

      $photoPath = null;
      $fileName = Carbon::now()->timestamp . '-' . auth()->user()->id;
      if ($request->hasFile('main_photo')) {
        $photoPath = $request->file('main_photo')->storeAs(
          'photos',
          $fileName . '.' . $request->file('main_photo')->getClientOriginalExtension(),
          'public'
        );
      }

      $course = Course::create([
        'name' => $request->name,
        'slug' => $request->name,
        'description' => $request->description,
        'subject_category_id' => $request->subject_category,
        'monthly_fee' => $request->monthly_fee,
        'type' => $request->type,
        'main_photo_path' => $photoPath
      ]);

      foreach($request->course_subjects as $subject) {
        CourseSubject::create([
          'course_id' => $course->id,
          'subject_id' => $subject,
        ]);
      }

      return redirect()->route('courses.index')
        ->with('success','New course ' . $request->course_name .' has been created successfully.');
    }


    public function edit(Course $course)
    {
      return view('settings.courses.edit', [
        'course' => $course,
        'categories' => SubjectCategory::orderBy('name', 'asc')->pluck('id','name'),
        'subjects' => Subject::orderBy('name', 'asc')->pluck('id', 'name'),
        'courseTypes' => ['physical', 'home', 'online'],
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
        'monthly_fee' => 'required',
        'main_photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      ]);

      $photoPath = null;
      $fileName = Carbon::now()->timestamp . '-' . auth()->user()->id;
      if ($request->hasFile('main_photo')) {
        $photoPath = $request->file('main_photo')->storeAs(
          'photos',
          $fileName . '.' . $request->file('main_photo')->getClientOriginalExtension(),
          'public'
        );
        $request['main_photo_path'] = $photoPath;
      }

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
