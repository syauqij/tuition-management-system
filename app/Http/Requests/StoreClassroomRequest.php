<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;


class StoreClassroomRequest extends FormRequest
{
    public function authorize()
    {
      return Gate::allows('manage_classrooms');
    }

    public function rules()
    {
        return [
          'class_name' => 'required|string|max:120',
          'class_room_no' => 'required|string|max:50',
          'selected_students' => [
            'required', 'array',
            'min:' . $this->input('class_min_student'),
            'max:' . $this->input('class_max_student')
          ],
          'class_grade_id' => 'required',
          'class_teacher_id' => 'required',
          'class_min_student' => 'required|min:1|max:10',
          'class_max_student' => 'required|min:1|max:50'
        ];
    }

}
