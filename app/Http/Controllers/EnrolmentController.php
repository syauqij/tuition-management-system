<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\ParentProfile;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;

class EnrolmentController extends Controller
{
    public function index()
    {

    }

    public function create(Request $request)
    {
      $role = auth()->user()->role;
      $userId = auth()->user()->id;
      $course_id = $request->course_id;

      if($role == 'student') {

        //get student and parent info
        $student = User::getUserProfile($role, $userId)->get()->first();

        //get course info
        $course = Course::with('subject', 'subjectCategory')
        ->where('id', $course_id)
        ->first();

        Session::put('enrol_course_id', $course->id);
      }
      else {
        return redirect()->route('courses.list')->with('error','You are not a student.');
      }

      return view('courses.enrol', [
        'course' => $course,
        'user' => $student
      ]);
    }

    public function store(UpdateProfileRequest $request)
    {
      $course_id = $request->session()->get('enrol_course_id');
      $userId = auth()->user()->id;
      $userDetails = $request->inputsUser();
      $studentProfile = $request->inputsUserProfile($userId);
      $parentProfile = $request->inputsParentProfile();

      auth()->user()->update($userDetails);

      $studentProfile = StudentProfile::updateOrCreate(
        ['user_id' => $userId],
        $studentProfile
      );

      $parentId = $studentProfile->parent_profile_id;
      $parentProfile = ParentProfile::updateOrCreate(
        ['id' => $parentId],
        $parentProfile
      );

      $getStudentProfile = StudentProfile::find($studentProfile->id);
      $getStudentProfile->parent_profile_id = $parentProfile->id;
      $getStudentProfile->save();

      $course = Course::with('subject', 'subjectCategory')
      ->where('id', $course_id)
      ->first();

      Enrolment::create([
        'student_user_id' => $userId,
        'course_id' => $course->id,
        'student_profile' => json_encode(collect($userDetails)->merge($studentProfile)),
        'parent_profile' => json_encode($parentProfile),
        'subject_category_id' => $course->subject_category_id,
        'subject_id' => $course->subject_id,
        'status' => 'applied'
      ]);

      return redirect()->route('dashboard')->with('success','Congrats. You have enroll');

    }

    public function show(Enrolment $enrolment)
    {
      $enrolment = $enrolment
      ->with('student', 'course', 'subject', 'subjectCategory', 'staff')
      ->first();

    }

    public function edit(Enrolment $enrolment)
    {
        //
    }

    public function update(Request $request, Enrolment $enrolment)
    {
        //
    }

    public function destroy(Enrolment $enrolment)
    {
        //
    }
}
