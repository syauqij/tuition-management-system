<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ServerStatus;
use Illuminate\Validation\Rules\Enum;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $role = auth()->user()->role;

        $userProfile = [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email|unique:users,email,'.$this->user()->id,
          'phone_no' => 'required|numeric|digits_between:10,12',
          'password' => 'sometimes|nullable|confirmed|min:8',
          'password_confirmation' => 'sometimes|required_with:password|same:password',
          'mykad' => 'required|digits:12',
          'birthdate' => 'required|date',
          'gender' => 'required',
          'street_1' => 'required',
          'street_2' => '',
          'postcode' => 'required|max:5',
          'city' => 'required',
          'state' => 'required',
          'country' => 'required',
        ];

        $parentProfile = [];
        if ($role == 'student') {
          $parentProfile = [
            'parent_first_name' => 'required',
            'parent_last_name' => 'required',
            'parent_email' => 'required|email',
            'parent_phone_no' => 'required|numeric|digits_between:10,12',
            'parent_mykad' => 'required|digits:12',
            'parent_birthdate' => 'required|date',
            'parent_relation' => 'required',
            'parent_gender' => 'required',
            'parent_street_1' => 'required',
            'parent_street_2' => '',
            'parent_postcode' => 'required|max:5',
            'parent_city' => 'required',
            'parent_state' => 'required',
            'parent_country' => 'required',
          ];
        }

        $rules = array_merge($parentProfile, $userProfile);

        return $rules;
    }

    public function inputsUserProfile($userId)
    {
      return [
        'mykad' => $this->input('mykad'),
        'birthdate' => $this->input('birthdate'),
        'gender' => $this->input('gender'),
        'street_1' => $this->input('street_1'),
        'street_2' => $this->input('street_2'),
        'postcode' => $this->input('postcode'),
        'city' => $this->input('city'),
        'state' => $this->input('state'),
        'country' => $this->input('country'),
        'user_id' => $userId
      ];
    }

    public function inputsParentProfile()
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
