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
      $getEnrolments = Enrolment::with('student', 'course');

      $role = auth()->user()->role;
      if($role == 'student') {
        $getEnrolments->where('student_user_id', auth()->user()->id);
      }

      $getEnrolments->orderby('created_at', 'desc');
      $enrolments = $getEnrolments->paginate(6);

      return view('enrolments.index', [
        'enrolments' => $enrolments,
      ]);
    }

    public function search(Request $request)
    {
      $keywords = $request->keywords;

      $searchEnrolments = Enrolment::with('student', 'course')
      ->whereRelation(
        'student', 'first_name', 'like', '%' . $keywords . '%'
      )->orWhereRelation(
        'student', 'last_name', 'like', '%' . $keywords . '%'
      )->orWhereRelation(
        'student.studentProfile', 'mykad', '=', $keywords
      )->orWhereRelation(
        'student', 'email', 'like', '%' . $keywords . '%'
      );

      $role = auth()->user()->role;
      if($role == 'student') {
        $searchEnrolments = $searchEnrolments->where('student_user_id', auth()->user()->id);
      }
      $searchEnrolments = $searchEnrolments->paginate(5);

      return view('enrolments.index', [
        'enrolments' => $searchEnrolments->appends(['keywords' => $keywords]),
        'keywords' => $keywords,
      ]);
    }

    public function create(Request $request)
    {
      $role = auth()->user()->role;
      $userId = auth()->user()->id;
      $course_id = $request->course_id;

      if($role == 'student') {
        //get student and parent info
        $user = User::getUserProfile($role, $userId)->get()->first();

        //get course info
        $course = Course::where('id', $course_id)->first();

        Session::put('enrol_course_id', $course->id);
      }
      else {
        return redirect()->route('courses.list')
          ->with('error','You are not a student to enrol courses');
      }

      return view('courses.enrol', compact('course', 'user'));
    }

    public function store(UpdateProfileRequest $request)
    {
      $courseId = $request->session()->get('enrol_course_id');
      $userId = auth()->user()->id;
      $userInputs = $request->inputsUser();
      unset($userInputs['role'], $userInputs['is_active']);

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

      $course = Course::where('id', $courseId)->first();

      //validate duplicate submission
      $request->request->add(['student_user_id' => $userId]);
      $request->validate([
        'student_user_id' => 'required|unique:enrolments,student_user_id,NULL,id,course_id,' . $courseId,
      ],[
        'unique' => 'You have already submitted an application for this course.',
      ]);

      Enrolment::create([
        'student_user_id' => $userId,
        'course_id' => $course->id,
        'student_profile' => collect($userInputs)->merge($studentProfile)->toJson(),
        'parent_profile' => $parentProfile->toJson(),
        'status' => 'applied'
      ]);

      return redirect()->route('enrolments.index')->with('success','Congrats! You have successfully submitted an application. We will get back to you as soon as possible.');
    }

    public function show(Enrolment $enrolment)
    {
      $enrolment
        ->with('student', 'course', 'staff')
        ->get();

      $course = $enrolment->course;
      $studentAddress = Enrolment::getAddress($enrolment->id, 'studentProfile');
      $parentAddress = Enrolment::getAddress($enrolment->id, 'parentProfile');

      return view('enrolments.show', compact(
        'enrolment','course','studentAddress','parentAddress'
      ));
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
