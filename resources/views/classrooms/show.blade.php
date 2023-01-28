<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('View Classroom') }}
      </h2>
  </x-slot>

  <x-content.card>
    <h1 class="text-xl font-bold">
      {{ $classroom->name }}
    </h1>
    <div class="flex flex-row pt-4">
      <div class="basis-full lg:basis-8/12">
        <div class="grid gap-4 gap-y-6 grid-cols-1 md:grid-cols-2">
          <div class="md:col-span-1">
            <x-content.profile-detail :label="__('Room No.')" :value="$classroom->room_no"/>
          </div>

          <div class="md:col-span-1">
            <x-content.profile-detail :label="__('Course')" :value="$classroom->courseSubject->course->name"/>
          </div>


          <div class="md:col-span-1">
            <x-content.profile-detail :label="__('Subject')" :value="$classroom->courseSubject->subject->name"/>
          </div>

          <div class="md:col-span-1">
            <x-content.profile-detail :label="__('School Grade')" :value="$classroom->schoolGrade->name"/>
          </div>

          <div class="md:col-span-1">
            <x-content.profile-detail :label="__('Class Teacher')" :value="$classroom->teacher->fullName"/>
          </div>

          <div class="md:col-span-1">
            <h2 class="text-gray-500 font-normalt">
              Class Size (Students)
            </h2>
            <div class="flex gap-2">

            <x-content.profile-detail :label="__('Min.')" :value="$classroom->min_students"/>

            <x-content.profile-detail :label="__('Max.')" :value="$classroom->max_students"/>

            </div>
          </div>
        </div>
      </div>

      <div class="basic-full lg:basis-4/12">
        <div>
          <h2 class="text-gray-500 font-normalt">
            Class Students
          </h2>
          @foreach ($classroom->classStudents as $student)
          <ol class="list-decimal text-gray-900 font-semibold">
            <li>
              {{ $student->enrolment->student_profile['first_name'] . ' ' .
                 $student->enrolment->student_profile['last_name'] }}
              @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
                <x-content.link class="font-semibold"
                value="{{$student->enrolment->student_profile['mykad']}}"
                href="{{ route('enrolments.show', $student->enrolment->id) }}" />
              @endif
            </li>
          </ul>
          @endforeach
        </div>
        @if($classroom->classStudents ->isEmpty())
          No records of assigned students. Please assign them.
        @endif
      </div>
    </div>

    <div class="flex justify-end pt-8">
      @if (auth()->user()->role == 'teacher' || auth()->user()->role == 'admin')
        <a href="{{ route('classrooms.edit', $classroom->id)}}">
          <x-forms.button-primary class="text-xs">
            {{ __('Edit') }}
          </x-forms.button-primary>
        </a>
      @endif
      <a href="{{ route('classrooms.list', $classroom->course_subject_id) }}">
        <x-forms.button-secondary class="text-xs">
          {{ __('Back') }}
        </x-forms.button-secondary>
      </a>
    </div>
  </x-content.card>
</x-app-layout>
