<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\StudentProfile;
use App\Models\ParentProfile;
use App\Models\StaffProfile;

class UserProfileController extends Controller
{
    public function show()
    {
      $role = auth()->user()->role;
      $userId = auth()->user()->id;

      $user = User::getUserProfile($role, $userId)->get()->first();

      if($role == 'student') {
        $view = 'users.student-profile';
      }
      else {
        $view = 'users.staff-profile';
      }

      return view($view, [
        'user' => $user
      ]);
    }

    public function update(UpdateProfileRequest $request)
    {
      $userId = auth()->user()->id;
      $userRole = auth()->user()->role;
      $password = $request->password;

      if(empty($password)) {
        $request->request->remove('password');
      } else {
        $request['password'] = bcrypt($password);
      }

      auth()->user()->update($request->all());

      if($userRole == 'student') {
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
      }
      else {
        StaffProfile::updateOrCreate(
          ['user_id' => $userId],
          $request->inputsUserProfile($userId)
        );
      }

      return redirect()->route('profile')->with('success', 'Profile saved successfully');
    }
}
