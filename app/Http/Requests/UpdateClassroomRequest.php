<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassroomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required|string|max:120',
          'room_no' => 'required|string|max:50',
          'selected_students' => [
            'required', 'array',
            'min:' . $this->input('min_students'),
            'max:' . $this->input('max_students')
          ],
          'teacher_user_id' => 'required',
          'min_students' => 'required|min:1|max:10',
          'max_students' => 'required|min:1|max:50',
        ];
    }

}
