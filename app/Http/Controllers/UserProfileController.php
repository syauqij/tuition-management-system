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
        return view('users.student-profile', [
          'user' => $user,
        ]);
      }
      else {
        return view('users.staff-profile', [
          'user' => $user
        ]);
      }
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

      $personalDetails = [
        'mykad' => $request->mykad,
        'birthdate' => $request->birthdate,
        'gender' => $request->gender,
        'street_1' => $request->street_1,
        'street_2' => $request->street_2,
        'postcode' => $request->postcode,
        'city' => $request->city,
        'state' => $request->state,
        'country' => $request->country,
        'user_id' => $userId
      ];

      if($userRole == 'student') {
        $studentProfile = StudentProfile::updateOrCreate(
          ['user_id' => $userId],
          $personalDetails
        );

        $parentId = $studentProfile->parent_profile_id;

        $parentProfile = ParentProfile::updateOrCreate(
          ['id' => $parentId],
          [
            'first_name' => $request->parent_first_name,
            'last_name' => $request->parent_last_name,
            'email' => $request->parent_email,
            'phone_no' => $request->parent_phone_no,
            'mykad' => $request->parent_mykad,
            'birthdate' => $request->parent_birthdate,
            'gender' => $request->parent_gender,
            'relationship' => $request->parent_relationship,
            'street_1' => $request->parent_street_1,
            'street_2' => $request->parent_street_2,
            'postcode' => $request->parent_postcode,
            'city' => $request->parent_city,
            'state' => $request->parent_state,
            'country' => $request->parent_country,
          ]
        );

          $getStudentProfile = StudentProfile::find($studentProfile->id);
          $getStudentProfile->parent_profile_id = $parentProfile->id;
          $getStudentProfile->save();
      }
      else {
        $staffProfile = StaffProfile::updateOrCreate(
          ['user_id' => $userId],
          $personalDetails
        );
      }

      return redirect()->route('profile')->with('success', 'Profile saved successfully');
    }
}
