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

    <form method="get" action="{{ route('courses.search') }}">
      <x-forms.search-input  name="keywords" value="{{ $keywords ?? null }}"
        placeholder="Enter course name, subject or subject category"/>

      <div class="grid grid-flow-row auto-rows-max md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6 text-center justify-center">
          @if ($courses->isEmpty())
            <div class="col-span-3">
              <h1 class="text-lg text-red-500 font-bold mt-5">
                No courses found. Please improve your search keywords.
              </h1>
            </div>
          @endif

          @foreach ($courses as $course)
            <div class="p-6 border-2 border-gray-600 bg-white max-w-sm
              hover:border-indigo-600 hover:border-4 hover:border-spacing-10
              hover:shadow-lg hover:shadow-indigo-500/50
              ease-in-out cursor-pointer">
              <a href="{{ route('courses.show', [
                'id' => $course->id,
                'slug' => $course->slug,
                ]) }}">
              <h5 class="text-gray-900 text-xl leading-tight font-semibold mb-2
                hover:text-indigo-800 hover:underline decoration-double truncate">
                {{$course->name}}
              </h5>
              <object class="text-gray-700 text-base mb-1 font-mono truncate
                hover:text-indigo-700 hover:underline decoration-solid">
                <a href="{{ route('courses.filter', [
                    'id' => $course->subjectCategory->id,
                    'type' => 'subjectCategory',
                    'name' => $course->subjectCategory->name
                  ]) }}">
                    {{$course->subjectCategory->name }}
                </a>
              </object>
              <object class="text-gray-700 text-base mb-4 font-light truncate
                hover:text-indigo-700 hover:underline decoration-dotted">
                <a href="{{ route('courses.filter', [
                    'id' => $course->subject->id,
                    'type' => 'subject',
                    'name' => $course->subject->name
                  ]) }}">
                    {{$course->subject->name }}
                </a>
              </object>
              <img src="https://static.vecteezy.com/system/resources/previews/000/104/432/original/basic-math-symbols-vectors.jpg"
                class="mb-4"
                alt="..."/>
            </a>
            </div>
          @endforeach
      </div>
      <div class="py-4 lg:pr-10">
        {{ $courses->links() }}
      </div>
    </form>
  </div>
</x-guest-layout>
