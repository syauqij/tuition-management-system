<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Enroll Course') }}
    </h2>
  </x-slot>

  <form method="POST" action="{{ route('enrolments.store') }}">
    @csrf

    @include('courses.info', ['enrol' => true])
    <input type="hidden" name="course_id" value="{{ $course->id }}" >

    @include('users.student-profile', ['enrol' => true])

    @include('users.parent-profile')

    <div class="text-right pt-5">
      <x-forms.button-primary class="uppercase">
        {{ __('Enroll This Course') }}
      </x-forms.button-primary>
    </div>
  </form>
</x-app-layout>
