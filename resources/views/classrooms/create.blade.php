<x-app-layout>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/choices.css')}}" />
  @endpush
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create Classroom') . ' - ' . $classroom->subject->name}}
      </h2>
  </x-slot>

  <x-content.card>
    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">New Classroom</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter the new classroom details below</p>
    </div>

    <form method="POST" action="{{ route('classrooms.store') }}">
      @csrf

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap m-2">

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course-name" :value="__('Course')" />
              <x-content.link class="font-semibold" :value="$classroom->course->name"
                href="{{ route('courses.show', $classroom->course->id) }}" />

              <x-forms.input-label class="pt-2" for="subject-name" :value="__('Subject')" />
              <p class="text-violet-600 font-semibold">
                {{ $classroom->subject->name }}
              </p>
              <input name="course_subject_id" value="{{ $courseSubjectId }}" type="hidden">
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class-name" :value="__('Class Name')" />

              <x-forms.input-text id="class-name" class="block mt-1 w-full" type="text" name="class_name"
                value="{{old('class_name')}}"
                placeholder="E.g. English F5B G1" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class-room-no" :value="__('Room No')" />

              <x-forms.input-text id="class-room-no" class="block mt-1 w-full" type="text" name="class_room_no"
                value="{{old('class_room_no')}}"
                placeholder="E.g. B1-L1-R03" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class-school-grade" :value="__('School Grade')" />

              <x-forms.select-input id="class-school-grade" class="block mt-1 w-full" type="text" name="class_grade_id"
                :value="old('class_grade_id')"
                :options="$schoolGrades" :title="__('School Grade')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class-teacher" :value="__('Class Teacher')" />

              <x-forms.select-input id="class-teacher" class="block mt-1 w-full" type="text" name="class_teacher_id"
                :value="old('class_teacher_id')"
                :options="$teachers" :title="__('Teacher')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class-min-students" :value="__('Min. Students')" />

              <x-forms.input-text id="class-min-students" class="block mt-1 w-full" type="text" name="class_min_students"
                value="{{old('class_min_students')}}"
                placeholder="E.g. 5" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class-max-students" :value="__('Max. Students')" />

              <x-forms.input-text id="class-max-students" class="block mt-1 w-full" type="text" name="class_max_students"
                value="{{old('class_max_students')}}"
                placeholder="E.g. 30" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class-students" :value="__('Assign Students')" />
              <p class="my-1 font-semibold text-sm text-blue-600 hover:text-blue-900" id="message"></p>
              <x-forms.choices id="class-students" name="selected_students[]"
                multiple x-init="function () { studentChoices($el) }"
                :options="$enrolments" :title="__('students')"
                :selected="old('selected_students')"
                required autofocus />
            </div>
          </div>

          <div class="pt-4 w-full flex justify-end">
            <a href="{{ route('classrooms.list', [
                'courseSubjectId' => $classroom->id
              ]) }}">
              <x-forms.button-secondary type='button'>
                {{ __('Cancel') }}
              </x-forms.button-secondary>
            </a>

            <x-forms.button-primary>
              {{ __('Create') }}
            </x-forms.button-primary>
          </div>

        </div>
      </div>

    </form>
  </x-content.card>
</x-app-layout>
