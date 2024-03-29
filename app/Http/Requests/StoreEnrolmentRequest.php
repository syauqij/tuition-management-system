<?php

namespace App\Http\Requests;

use App\Models\StudentProfile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnrolmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      $userId = auth()->user()->id;
      $student = StudentProfile::select('parent_profile_id')
        ->where('user_id', $userId)->first();

      return [
        //users table
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'email|unique:users,email,'.$userId,
        'phone_no' => 'required|numeric|digits_between:10,12',

        //student_profiles table
        'mykad' => 'required|digits:12',
        'birthdate' => 'required|date',
        'gender' => 'required',
        'street_1' => 'required',
        'street_2' => '',
        'postcode' => 'required|max:5',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',

        //parent_profiles table
        'parent_first_name' => 'required',
        'parent_last_name' => 'required',
        'parent_email' => ['required',
          Rule::unique('parent_profiles', 'email')
            ->ignore($student->parent_profile_id),
          ],
        'parent_phone_no' => 'required|numeric|digits_between:10,12',
        'parent_mykad' => 'required|digits:12',
        'parent_birthdate' => 'required|date',
        'parent_relationship' => 'required',
        'parent_gender' => 'required',
        'parent_street_1' => 'required',
        'parent_street_2' => '',
        'parent_postcode' => 'required|max:5',
        'parent_city' => 'required',
        'parent_state' => 'required',
        'parent_country' => 'required',

        //enrolments table
        'course_id' => Rule::unique('enrolments')->where(fn ($query) =>
            $query->where('student_user_id', $userId)
          )
      ];

    }

    public function messages()
    {
        return [
            'course_id.unique' => 'You have already submitted an application for this course'
        ];
    }

    public function userColumns()
    {
      return [
        'first_name' => $this->input('first_name'),
        'last_name' => $this->input('last_name'),
        'email' => $this->input('email'),
        'phone_no' => $this->input('phone_no'),
      ];
    }

    public function studentProfileColumns($userId)
    {
      return [
        'user_id' => $userId,
        'mykad' => $this->input('mykad'),
        'birthdate' => $this->input('birthdate'),
        'gender' => $this->input('gender'),
        'street_1' => $this->input('street_1'),
        'street_2' => $this->input('street_2'),
        'postcode' => $this->input('postcode'),
        'city' => $this->input('city'),
        'state' => $this->input('state'),
        'country' => $this->input('country'),
      ];
    }

    public function parentProfileColumns()
    {
      return [
        'first_name' => $this->input('parent_first_name'),
        'last_name' => $this->input('parent_last_name'),
        'email' => $this->input('parent_email'),
        'phone_no' => $this->input('parent_phone_no'),
        'mykad' => $this->input('parent_mykad'),
        'birthdate' => $this->input('parent_birthdate'),
        'gender' => $this->input('parent_gender'),
        'relationship' => $this->input('parent_relationship'),
        'street_1' => $this->input('parent_street_1'),
        'street_2' => $this->input('parent_street_2'),
        'postcode' => $this->input('parent_postcode'),
        'city' => $this->input('parent_city'),
        'state' => $this->input('parent_state'),
        'country' => $this->input('parent_country'),
      ];
    }
}
