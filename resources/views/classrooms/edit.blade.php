<x-app-layout>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/choices.css')}}" />
  @endpush

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Classroom') }}
      </h2>
  </x-slot>

  <x-content.card>
    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $classroom->name }}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please update the classroom details below</p>
    </div>

    <form method="POST" action="{{ route('classrooms.update', $classroom->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap m-2">

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class_name" :value="__('Course')" />
              <x-content.link class="font-semibold" :value="$classroom->courseSubject->course->name"
                href="{{ route('courses.show', $classroom->courseSubject->course_id) }}" />

              <x-forms.input-label class="pt-2" for="class_name" :value="__('Subject')" />
              <p class="text-violet-600 font-semibold">
                {{ $classroom->courseSubject->subject->name }}
              </p>
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class_name" :value="__('Class Name')" />

              <x-forms.input-text id="classroom_name" class="block mt-1 w-full" type="text" name="name"
                value="{{ $classroom->name ?? old('classroom_name')}}"
                placeholder="E.g. English F5B G1" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_room_no" :value="__('Room No')" />

              <x-forms.input-text id="class_room_no" class="block mt-1 w-full" type="text" name="room_no"
                value="{{ $classroom->room_no ?? old('class_room_no')}}"
                placeholder="E.g. B1-L1-R03" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_school_grade" :value="__('School Grade')" />

              <x-forms.select-input id="class_school_grade" class="block mt-1 w-full" type="text" name="school_grade_id"
                :options="$schoolGrades" :title="__('School Grade')"
                :value="$classroom->school_grade_id ?? old('class_school_grade')"
                required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class_teacher" :value="__('Class Teacher')" />

              <x-forms.select-input id="class_teacher" class="block mt-1 w-full" type="text" name="teacher_user_id"
                :value="$classroom->teacher_user_id ?? old('class_teacher')"
                :options="$teachers" :title="__('Teacher')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_min_student" :value="__('Min. Student')" />

              <x-forms.input-text id="class_min_student" class="block mt-1 w-full" type="text" name="min_students"
                :value="$classroom->min_students ?? old('class_min_student')"
                placeholder="E.g. 5" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_max_student" :value="__('Max. Student')" />

              <x-forms.input-text id="class_max_student" class="block mt-1 w-full" type="text" name="max_students"
                :value="$classroom->max_students ?? old('class_max_student')"
                placeholder="E.g. 30" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="enroled_students" :value="__('Assigned Students')" />

              <x-forms.choices id="selected_students" name="selected_students[]"
                multiple x-data="{}" x-init="function () { choices($el) }"
                :options="$enrolments" :title="__('students')"
                :selected="old('selected_students') ??
                  $classroom->classStudents->pluck('enrolment_id')->toArray() ?? 'default'"
                required autofocus />

              @if($classroom->classStudents->isEmpty())
                No records of assigned students. Please assign them.
              @endif

            </div>
          </div>

          <div class="pt-4 w-full flex justify-end">
            <td class="text-center">
              <a href="{{ route('classrooms.list', [
                  'courseSubjectId' => $classroom->courseSubject->id
                ]) }}">
                <x-forms.button-secondary type='button'>
                  {{ __('Cancel') }}
                </x-forms.button-secondary>
              </a>
            </td>
                <x-forms.button-primary>
                  {{ __('Update') }}
                </x-forms.button-primary>
            </div>
        </div>
      </div>

    </form>
  </x-content.card>
</x-app-layout>
