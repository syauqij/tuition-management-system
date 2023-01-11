<x-content.card contentClasses="bg-blue-200">
  <div class="items-center">
    <div class="grid gap-y-2 grid-cols-1 lg:grid-cols-3">
      <div class="lg:col-span-2 mr-4">

        <p class="text-4xl mb-2 md:text-3xl title-font font-bold text-violet-700 tracking-tight">
          {{ $course->name }}
        </p>
        <span class="text-xs py-1 px-2.5 leading-none text-center whitespace-nowrap
          align-baseline font-bold bg-gray-800 text-white">
          {{ $course->subjectCategory->name }}
        </span>

        <span class="text-xs pl-2 py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold
          bg-gray-200 text-gray-700 capitalize">
          {{ $course->type . ' Class'}}
        </span>

        <div class="text-justify lg:mr-4 mt-4">
          {!! nl2br(e($course->description)) !!}
        </div>

        <div class="py-4">
          <div class="flex flex-wrap gap-2">
            @foreach ($course->subjects as $subject)
              <x-content.chips>
                {{ $subject->name }}
              </x-content.chips>
            @endforeach
          </div>
        </div>

      </div>
      <div class="">
        <img src="{{ asset('storage/' . $course->main_photo_path) }}" class="mb-2"
          alt="course-main-photo" title="{{ $course->main_photo_path }}" >

          <h1 class="text-2xl text-gray-900 leading-none flex pt-2">
            @if ($course->monthly_fee == 0.00)
              <span>FREE</span>
            @else
              <span>RM {{ $course->monthly_fee }}</span>
              <span class="text-sm ml-1 font-normal text-gray-500">per month</span>
            @endif
          </h1>

          <div class="pb-2">
            @if (isset($enrol) == true)
              <a href=" {{ route('enrolments.create', [
                  'course_id' => $course->id
                ]) }} " >
                <x-forms.button-primary class="mt-4">
                  {{ __('Enroll Now') }}
                </x-forms.button-primary>
              </a>
            @endif
          </div>

      </div>
    </div>
  </div>
</x-content.card>
