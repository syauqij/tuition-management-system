<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
      $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', Rules\Password::defaults()],
        'last_name' => ['required', 'string', 'max:255'],
        'phone_no' => 'required|numeric|digits_between:10,12'
      ]);

      $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone_no' => $request->phone_no,
        'role' => 'student'
      ]);

      event(new Registered($user));

      Auth::login($user);

      $enrolCourseId = $request->session()->get('enrol_course_id');
      if ($enrolCourseId) {
        return redirect()->route('enrolments.create', ['course_id' => $enrolCourseId]);
      }

      return redirect(RouteServiceProvider::HOME)->with('success', 'Thank you for registering with us! Please update your profile to get started.' );
    }
  }
