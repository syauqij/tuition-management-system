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
            @isset($enrol)
              <a href="{{ route('enrolments.create', [
                'course_id' => $course->id,
                'slug' => $course->slug,
                ]) }}">
            @else
              <a href="{{ route('courses.show', [
                'id' => $course->id,
                'slug' => $course->slug,
                ]) }}">
            @endisset

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
            <img src="{{ asset('storage/' . $course->main_photo_path) }}" class="my-2"
              alt="course-main-photo" title="{{ $course->main_photo_path }}" >
          </a>
          </div>
        @endforeach
    </div>
    <div class="py-4">
      {{ $courses->links() }}
    </div>

  </form>
