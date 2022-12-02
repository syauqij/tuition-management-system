<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Courses') }}
      </h2>
  </x-slot>

  <x-content.card>
  <div class="flex flex-col text-center w-full mb-10">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Manage Courses</h1>
    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please select the course below to edit or
      <x-content.link :value="__('Create New Course')" href="{{ route('courses.create') }}" /></p>
  </div>

  <form method="get" action="{{ route('courses.search') }}">
    <x-forms.search-input  name="keywords" value="{{ $keywords ?? null }}"
      placeholder="Enter course name"/>
  </form>

  <div class="flex flex-wrap lg:px-10 sm:mx-auto sm:mb-2 -mx-2">
    @foreach ($courses as $course)
    <x-content.setting-card width="md:w-1/2 lg:w-1/3" align="p-2 justify-center">
        <x-content.link :value="$course->name" href="{{ route('courses.edit', $course->id)}}" />
    </x-content.setting-card>
    @endforeach
  </div>

    </x-content.card>
</x-app-layout>
