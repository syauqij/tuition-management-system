<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Courses') }}
      </h2>
  </x-slot>

  <x-content.card>
    <div class="mx-auto lg:w-11/12">
      @if(auth()->user()->role == 'student')
        @include('courses.list', ['enrol' => true])
      @else
        @include('courses.list')
      @endif
    </div>
  </x-content.card>
</x-app-layout>
