<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Courses') }}
      </h2>
  </x-slot>

  <x-content.card>
    <div class="mx-auto lg:w-11/12">
      @include('courses.list', ['enrol' => true])
    </div>
  </x-content.card>
</x-app-layout>
