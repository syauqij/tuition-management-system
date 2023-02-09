<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Course;
use App\Models\CourseSubject;
use App\Models\ClassStudent;
use App\Models\Enrolment;
use App\Models\SchoolGrade;
use App\Models\User;

class ClassroomController extends Controller
{
    public function index()
    {
      $role = auth()->user()->role;

      $courses = Course::select(['id','name'])
      ->with([
        'courseSubjects' => [
          'subject',
          'classrooms',
        ]
      ])->withCount(['enrolments' => function (Builder $query) {
          $query->where('status', '=', 'accepted');
      }]);

        if($role == 'student') {
          $courses = $courses->whereRelation(
            'enrolments', 'student_user_id', '=', auth()->user()->id
          );
        }

        $courses = $courses->orderBy('created_at', 'desc')
          ->paginate(4);

      return view('classrooms.index', compact('courses'));
    }

    public function list($courseSubjectId)
    {
      $courseSubject = CourseSubject::with(['course', 'subject'])
        ->where('id', $courseSubjectId)
        ->first();

      $classrooms = Classroom::select(
        'id','name','room_no',
        'school_grade_id', 'teacher_user_id'
      )
      ->with([
        'schoolGrade:id,name',
        'teacher:id,first_name,last_name'
      ])
      ->withCount('classStudents')
      ->where('course_subject_id', $courseSubjectId)
      ->paginate(5);

      return view('classrooms.list', compact('courseSubject', 'classrooms'));
    }

    public function search(Request $request)
    {
      $role = auth()->user()->role;
      $keywords = $request->keywords;
      $filterSubject = $request->subject_only;

      $callback = function($query) use($keywords, $filterSubject){
        $filterSubject ? $query->where('name', 'like', '%' . $keywords . '%') : '';
      };

      $searchCourses = Course::where(
        'name', 'like', '%' . $keywords . '%'
      )->orWhereRelation(
          'subjects', 'name', 'like', '%' . $keywords . '%'
      )->with([
        'subjectCategory',
        'courseSubjects' => [
            'classrooms',
            'subject' => $callback
          ],
      ])->withCount(['enrolments' => function (Builder $query) {
          $query->where('status', '=', 'accepted');
      }]);

      if($role == 'student') {
        $searchCourses = $searchCourses->whereRelation(
          'enrolments', 'student_user_id', '=', auth()->user()->id
        );
      }

      $searchCourses = $searchCourses->orderBy('created_at', 'desc')
        ->paginate(4);

      return view('classrooms.index', [
        'courses' => $searchCourses->appends(['keywords' => $keywords]),
        'filterSubject' => $filterSubject,
        'keywords' => $keywords
      ]);
    }

    public function create(Request $request)
    {
      $courseSubjectId = $request->courseSubjectId;

      $classroom = CourseSubject::with(['course', 'subject'])
        ->where('id', $courseSubjectId)
        ->first();

      $existingStudents = ClassStudent::with('classroom')
        ->whereRelation('classroom',
          'course_subject_id', '=', $courseSubjectId)
        ->pluck('enrolment_id');

      $enrolments = Enrolment::enroledStudents($classroom->course->id)
      ->whereNotIn('id', $existingStudents)
      ->get()->pluck('id', 'studentName');

      if($enrolments->isEmpty()) {
        return redirect()->route('classrooms.list', $classroom->id)
          ->with('info',
          'No records of enroled students for this course or all has been assigned to their respective classroom. Please try again later.'
        );
      }

      $schoolGrades = SchoolGrade::orderBy('name', 'asc')->pluck('id','name');
      $teachers = User::orderBy('first_name', 'asc')->get()
        ->where('role', 'teacher')
        ->pluck('id','fullName');

      return view('classrooms.create', compact(
        'classroom','enrolments','schoolGrades','courseSubjectId','teachers'
      ));
    }

    public function store(StoreClassroomRequest $request)
    {
      $classroom = Classroom::create([
        'name' => $request->class_name,
        'room_no' => $request->class_room_no,
        'course_subject_id' => $request->course_subject_id,
        'school_grade_id' => $request->class_grade_id,
        'teacher_user_id' => $request->class_teacher_id,
        'min_students' => $request->class_min_students,
        'max_students' => $request->class_max_students,
      ]);

      $selectedStudents = $request->selected_students;
      foreach($selectedStudents as $enrolmentId){
        ClassStudent::create([
          'enrolment_id' => $enrolmentId,
          'classroom_id' => $classroom->id,
        ]);
      }

      return redirect()->route('classrooms.list', $classroom->course_subject_id)
        ->with('success','New classroom ' . $request->class_name .' has been created successfully.');
    }

    public function edit(Classroom $classroom)
    {
      $enrolments = Enrolment::enroledStudents($classroom->courseSubject->course_id)
      ->get()->pluck('id', 'studentName');

      $schoolGrades = SchoolGrade::orderBy('name', 'asc')->pluck('id','name');
      $teachers = User::orderBy('first_name', 'asc')->get()
        ->where('role', 'teacher')
        ->pluck('id','fullName');

      return view('classrooms.edit', compact(
        'classroom', 'enrolments', 'schoolGrades', 'teachers',
      ));
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
      $classroom->fill($request->post())->save();

      $selectedStudents = $request->selected_students;

      if($selectedStudents){
        foreach($selectedStudents as $enrolmentId){
          ClassStudent::updateOrCreate(
            ['enrolment_id' => $enrolmentId, 'classroom_id' => $classroom->id],
          );
        }

        $existingStudents = $classroom->classStudents()->pluck('enrolment_id')->toArray();

        foreach($existingStudents as $student) {
          if(!in_array($student, $selectedStudents)) {
            ClassStudent::where('classroom_id', $classroom->id)
              ->where('enrolment_id', $student)
              ->firstOrFail()->delete();
          }
        }
      }

      return redirect()->route('classrooms.list', $classroom->course_subject_id)
        ->with('success','Classroom ' . $classroom->name . ' details updated successfully');
    }

    public function destroy(Classroom $classroom)
    {
      $classroom->delete();

      return redirect()->route('classrooms.list', $classroom->course_subject_id)
        ->with('success','Classroom deleted successfully');
    }

    public function show(Classroom $classroom)
    {
      $classroom->with('course', 'subject', 'classStudent', 'teacher');

      return view('classrooms.show', compact('classroom'));
    }
}
