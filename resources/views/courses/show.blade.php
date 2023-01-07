<x-guest-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Courses') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mx-auto xl:w-9/12 2xl:w-8/12 pb-6">
        @include('courses.info', ['enrol' => true])
    </div>
  </x-content.card>
</x-guest-layout>
