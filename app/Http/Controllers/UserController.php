<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\ParentProfile;
use App\Models\StaffProfile;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
      $users = User::paginate(6);

      return view('users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(User $user)
    {
      $role = $user->role;
      $userId = $user->id;

      $user = User::getUserProfile($role, $userId)->get()->first();

      return view('users.edit', [
        'user' => $user,
        'role' => $role,
        'roles' => ['student', 'teacher', 'admin']
      ]);
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
      $userId = $user->id;
      $userRole = $user->role;
      $password = $request->password;

      if(empty($password)) {
        $request->request->remove('password');
      } else {
        $request['password'] = bcrypt($password);
      }

      $user->update($request->all());

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

      return redirect()->route('users.index')->with('success', $user->fullName . ' Profile saved successfully');
    }

}
