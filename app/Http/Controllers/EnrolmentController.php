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

class EnrolmentController extends Controller
{
    public function index()
    {
      $getEnrolments = Enrolment::with('student', 'course', 'subject', 'subjectCategory');

      $enrolments = $getEnrolments->paginate(6);

      return view('enrolments.index', [
        'enrolments' => $enrolments,
      ]);
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
        return redirect()->route('courses.show', $course_id);
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
      $userInputs = $request->inputsUser();

      auth()->user()->update($userInputs);

      $studentProfile = StudentProfile::updateOrCreate(
        ['user_id' => $userId],
        $request->inputsUserProfile($userId)
      );

      $parentId = $studentProfile->parent_profile_id;
      $parentProfile = ParentProfile::updateOrCreate(
        ['id' => $parentId],
        $request->inputsParentProfile()
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
        'student_profile' => collect($userInputs)->merge($studentProfile)->toJson(),
        'parent_profile' => $parentProfile->toJson(),
        'subject_category_id' => $course->subject_category_id,
        'subject_id' => $course->subject_id,
        'status' => 'applied'
      ]);

      return redirect()->route('dashboard')->with('success','Congrats. You have enroll');
    }

    public function show(Enrolment $enrolment)
    {
      $enrolment = $enrolment
      ->with('student', 'course', 'staff')
      ->first();

      $studentAddress = Enrolment::getAddress($enrolment->id, 'studentProfile');
      $parentAddress = Enrolment::getAddress($enrolment->id, 'parentProfile');

      return view('enrolments.show', [
        'enrolment' => $enrolment,
        'course' => $enrolment->course,
        'studentAddress' => $studentAddress,
        'parentAddress' => $parentAddress,
      ]);
    }

    public function status($id, $status)
    {
       $enrolmentId = $id;
       $userId = auth()->user()->id;
       $role = auth()->user()->role;

       if ($role == 'admin') {
          Enrolment::where('id', $enrolmentId)
            ->update(['status' => $status, 'updated_by' => $userId]);
       } else {
          return redirect()->route('enrolments.show', $enrolmentId)->with('error','You are not authorised.');
       }
       return redirect()->route('enrolments.show', $enrolmentId)->with('success','Status (' . $status .') has been updated successfully.');
    }
}
