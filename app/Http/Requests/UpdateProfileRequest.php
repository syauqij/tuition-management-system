<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        $role = auth()->user()->role;

        $parentProfile = [];
        if ($role == 'student') {
          $parentProfile = [
            'parent_first_name' => 'required',
            'parent_last_name' => 'required',
            'parent_email' => 'required',
            'parent_phone_no' => 'required',
            'parent_mykad' => 'required',
            'parent_birthdate' => 'required',
            'parent_gender' => 'required',
            'parent_street_1' => 'required',
            'parent_street_2' => 'required',
            'parent_postcode' => 'required',
            'parent_city' => 'required',
            'parent_state' => 'required',
            'parent_country' => 'required',
          ];
        }

        $userProfile = [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email|unique:users,email,'.$this->user()->id,
          'phone_no' => 'required|numeric|digits_between:10,12',
          'password' => 'sometimes|nullable|confirmed|min:8',
          'password_confirmation' => 'sometimes|required_with:password|same:password',
        ];

        $rules = array_merge($parentProfile, $userProfile);

        return $rules;
    }
}
