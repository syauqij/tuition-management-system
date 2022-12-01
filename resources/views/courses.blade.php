<x-guest-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Courses') }}
      </h2>
  </x-slot>

  <div class="container px-5 py-20 mx-auto">

    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="text-5xl xl:text-6xl font-bold tracking-tight mb-12">Explore Our Courses</h1>
      <p class="text-2xl font-medium mb-4">We offer
        <span class="text-indigo-600">quality and certified</span> courses</p>
      <p class="lg:w-4/5 w-full leading-relaxed text-gray-500 text-xl">
        Enrol our Award Winning courses to Jump Start your child’s Learning Journey.
      </p>
    </div>

    <div class="grid grid-flow-row auto-rows-max md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6 text-center justify-center">
        @foreach ($courses as $course)
          <div class="p-6 border-2 border-gray-600 bg-white max-w-sm
            hover:shadow-inner hover:border-indigo-800 hover:border-l-8 hover:border-spacing-10 ease-in-out cursor-pointer">
            <a href="{{ route('courses.show', [
              'id' => $course->id,
              'slug' => $course->slug,
              ]) }}">
            <h5 class="text-gray-900 text-xl leading-tight font-semibold mb-2 hover:text-indigo-800 hover:underline decoration-double">
              {{$course->name}}
            </h5>
            <object class="text-gray-700 text-base mb-1 font-mono hover:text-indigo-700 hover:underline decoration-solid">
              <a href="{{ route('courses.filter', [
                  'id' => $course->subjectCategory->id,
                  'type' => 'subjectCategory',
                ]) }}">
                  {{$course->subjectCategory->name }}
              </a>
            </object>
            <object class="text-gray-700 text-base mb-4 font-light hover:text-indigo-700 hover:underline decoration-dotted">
              <a href="{{ route('courses.filter', [
                  'id' => $course->subject->id,
                  'type' => 'subject',
                ]) }}">
                  {{$course->subject->name }}
              </a>
            </object>
            <img src="https://mdbootstrap.com/img/new/standard/city/041.jpg"
              class="mb-4"
              alt="..."/>
          </a>
          </div>
        @endforeach
    </div>
    <div class="py-4 pr-4">
      {{ $courses->links() }}
    </div>
  </div>
</x-guest-layout>
