<x-guest-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Courses') }}
      </h2>
  </x-slot>

  <div class="container px-5 py-20 mx-auto lg:w-9/12">

    <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
      <h1 class="text-5xl xl:text-6xl font-bold tracking-tight mb-12">Explore Our Courses</h1>
      <p class="text-2xl font-medium mb-4">We offer
        <span class="text-indigo-600">quality and certified</span> courses</p>
      <p class="lg:w-4/5 w-full leading-relaxed text-gray-500 text-xl">
        Enrol our Award Winning courses to Jump Start your child’s Learning Journey.
      </p>
    </div>

    @include('courses.list')
  </div>

</x-app-layout>
