<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Classroom') }}
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
              <x-forms.input-label for="class_name" :value="__('Course')" />
              <x-content.link class="font-semibold" :value="$classroom->course->name"
                href="{{ route('courses.show', $classroom->course->id) }}" />

              <x-forms.input-label class="pt-2" for="class_name" :value="__('Subject')" />
              <p class="text-violet-600 font-semibold">
                {{ $classroom->subject->name }}
              </p>
              <input name="course_subject_id" value="{{ $courseSubjectId }}" type="hidden">
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class_name" :value="__('Class Name')" />

              <x-forms.input-text id="classroom_name" class="block mt-1 w-full" type="text" name="class_name"
                value="{{old('classroom_name')}}"
                placeholder="E.g. English F5B G1" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_room_no" :value="__('Room No')" />

              <x-forms.input-text id="class_room_no" class="block mt-1 w-full" type="text" name="class_room_no"
                value="{{old('class_room_no')}}"
                placeholder="E.g. B1-L1-R03" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_school_grade" :value="__('School Grade')" />

              <x-forms.select-input id="class_school_grade" class="block mt-1 w-full" type="text" name="class_grade_id"
                :options="$schoolGrades" :title="__('School Grade')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="class_teacher" :value="__('Class Teacher')" />

              <x-forms.select-input id="class_teacher" class="block mt-1 w-full" type="text" name="class_teacher"
                :options="$teachers" :title="__('Teacher')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_min_student" :value="__('Min. Student')" />

              <x-forms.input-text id="class_min_student" class="block mt-1 w-full" type="text" name="class_min_student"
                value="{{old('class_min_student')}}"
                placeholder="E.g. 5" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="class_max_student" :value="__('Max. Student')" />

              <x-forms.input-text id="class_max_student" class="block mt-1 w-full" type="text" name="class_max_student"
                value="{{old('class_max_student')}}"
                placeholder="E.g. 30" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="enroled_students" :value="__('Assign Students')" />

              @foreach ($enrolments as $enrolment)
                <div class="flex">
                  <div class="form-check">
                    <x-forms.checkbox-input type="checkbox" name="selected_students[]"
                      value="{{ $enrolment->id }}" checked />

                    <label class="form-check-label inline-block">
                      {{$enrolment->student->fullName . ' - ' . $enrolment->student_profile->mykad}}
                      <x-content.link class="font-semibold"
                        :value="__('View Application')"
                        href="{{ route('enrolments.show', $enrolment->id) }}" />
                    </label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <div class="pt-4 w-full flex justify-end">
            <x-forms.button-cancel class="mr-2" :value="__('classrooms.index')" >
              {{ __('Cancel') }}
            </x-forms.button-cancel>

            <x-forms.button-primary>
              {{ __('Create') }}
            </x-forms.button-primary>
          </div>

        </div>
      </div>

    </form>
  </x-content.card>
</x-app-layout>
