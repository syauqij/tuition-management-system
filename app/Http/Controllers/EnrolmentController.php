<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEnrolmentRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\ParentProfile;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Session;

class EnrolmentController extends Controller
{
    public function index()
    {
      $query = Enrolment::with('course');

      $role = auth()->user()->role;
      if($role == 'student') {
        $query->where('student_user_id', auth()->user()->id);
      }

      $query->orderby('created_at', 'desc');
      $enrolments = $query->paginate(6);

      return view('enrolments.index', compact('enrolments'));
    }

    public function search(Request $request)
    {
      $keywords = $request->keywords;

      $query = Enrolment::with('student', 'course')
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
        $enrolments = $query->where('student_user_id', auth()->user()->id);
      }
      $enrolments = $query->paginate(5);

      return view('enrolments.index', [
        'enrolments' => $enrolments->appends(['keywords' => $keywords]),
        'keywords' => $keywords,
      ]);
    }

    public function create(Request $request)
    {
      $role = auth()->user()->role;
      $userId = auth()->user()->id;
      $course_id = $request->course_id;

      if($role == 'student') {
        $user = User::getUserProfile($role, $userId)->get()->first();
        $course = Course::where('id', $course_id)->first();

        Session::put('enrol_course_id', $course->id);
      }
      else {
        return redirect()->route('courses.list')
          ->with('error','You are not a student to enrol courses');
      }

      return view('courses.enrol', compact('course', 'user'));
    }

    public function store(StoreEnrolmentRequest $request)
    {
      $courseId = $request->session()->get('enrol_course_id');
      $userId = auth()->user()->id;

      auth()->user()->update($request->userColumns());

      $studentProfile = StudentProfile::updateOrCreate(
        ['user_id' => $userId],
        $request->studentProfileColumns($userId)
      );

      $parentProfile = ParentProfile::updateOrCreate(
        ['id' => $studentProfile->parent_profile_id],
        $request->parentProfileColumns()
      );

      $studentProfile->update(['parent_profile_id' => $parentProfile->id]);

      Enrolment::create([
        'student_user_id' => $userId,
        'course_id' => $courseId,
        'student_profile' => collect($request->userColumns())
          ->merge($studentProfile),
        'parent_profile' => $parentProfile,
        'status' => 'applied'
      ]);

      return redirect()->route('enrolments.index')
      ->with('success','Congrats! You have successfully submitted an application.
        We will get back to you as soon as possible.');
    }

    public function show(Enrolment $enrolment)
    {
      $studentAddress = Enrolment::getAddress($enrolment->student_profile);
      $parentAddress = Enrolment::getAddress($enrolment->parent_profile);

      return view('enrolments.show', compact(
        'enrolment', 'studentAddress', 'parentAddress'
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
