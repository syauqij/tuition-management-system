<x-guest-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Courses') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mx-auto lg:w-10/12">
        @include('courses.info')
    </div>
  </x-content.card>
</x-guest-layout>
