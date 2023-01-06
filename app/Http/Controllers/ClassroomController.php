<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
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
      //get all subjects from course subject table
      $courses = Course::with(['subjectCategory', 'courseSubjects.subject'])
        ->orderBy('created_at', 'desc')
        ->get();

      return view('classrooms.index', [
        'courses' => $courses
      ]);
    }

    public function create(Request $request)
    {
      $classroom = CourseSubject::with(['course', 'subject'])
        ->where('id', $request->courseSubjectId)
        ->first();

      $enrolments = Enrolment::enroledStudents($classroom->course->id)->get();
      $schoolGrades = SchoolGrade::orderBy('name', 'asc')->pluck('id','name');
      $teachers = User::orderBy('first_name', 'asc')->get()
        ->where('role', 'teacher')
        ->pluck('id','fullName');

      return view('classrooms.create', [
        'classroom' => $classroom,
        'enrolments' => $enrolments,
        'schoolGrades' => $schoolGrades,
        'courseSubjectId' => $request->courseSubjectId,
        'teachers' => $teachers
      ]);
    }

    public function store(Request $request)
    {
      $request->validate([
        'class_name' => ['required', 'string', 'max:120'],
        'class_room_no' => ['required', 'string', 'max:50'],
        'selected_students' => ['required'],
        'class_grade_id' => ['required'],
        'class_teacher' => ['required'],
        'class_min_student' => ['required', 'min:1', 'max:10'],
        'class_max_student' => ['required', 'min:1', 'max:50'],
      ]);

      $classroom = Classroom::create([
        'name' => $request->class_name,
        'room_no' => $request->class_room_no,
        'course_subject_id' => $request->course_subject_id,
        'school_grade_id' => $request->class_grade_id,
        'teacher_user_id' => $request->class_teacher,
        'min_students' => $request->class_min_student,
        'max_students' => $request->class_max_student,
      ]);

      //save classroom students
      $selectedStudents = $request->selected_students;
      foreach($selectedStudents as $enrolmentId){
        ClassStudent::create([
          'enrolment_id' => $enrolmentId,
          'classroom_id' => $classroom->id,
        ]);
      }

      return redirect()->route('classrooms.index')->with('success','New classroom ' . $request->class_name .' has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
