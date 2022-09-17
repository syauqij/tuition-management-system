<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;

class UserProfileController extends Controller
{
    public function show()
    { 
      return view('profile');
    }

    public function update(UpdateProfileRequest $request)
    {
      
      auth()->user()->update($request->only('first_name', 'last_name', 'email', 'phone_no'));

      return redirect()->route('profile')->with('success', 'Profile saved successfully');
    }
}
