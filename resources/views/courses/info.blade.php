<x-content.card contentClasses="bg-blue-200">
  <div class="items-center">
    <div class="grid gap-y-2 grid-cols-1 lg:grid-cols-3">
      <div class="lg:col-span-2">
        <p class="text-4xl md:text-3xl title-font font-bold text-violet-700 tracking-tight mb-2">
          {{ $course->name }}
        </p>
        <span class="text-xs py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-800 text-white">
          {{ $course->subjectCategory->name }} {{-- To add new Price data --}}
        </span>
        <div class="lg:w-7/12 text-justify mt-4">
          {{ $course->description }}
        </div>
        <div class="justify-bottom">
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
      <div class="">
        <img src="{{ asset('storage/' . $course->main_photo_path) }}" class="mb-2"
          alt="course-main-photo" title="{{ $course->main_photo_path }}" >
      </div>
    </div>
  </div>
</x-content.card>

<x-content.card contentClasses="bg-gray-200">
  <p class="text-3xl md:text-2xl title-font font-bold tracking-tight">
    Course Details
  </p>

  <div class="pt-2">
    <x-content.label class="pl-1 py-1">
      Course Subjects
    </x-content.label>

    <div class="flex flex-wrap space-x-2">
      @foreach ($course->subjects as $subject)
        <x-content.chips>
          {{ $subject->name }}
        </x-content.chips>
      @endforeach
    </div>

    <x-content.label class="pl-1 pt-3">
      Tuition Type
    </x-content.label>

    <h3 class="pl-1 font-semibold capitalize">
      {{ $course->type }}
    </h3>

    <x-content.label class="pl-1 pt-3">
      Tuition Fees
    </x-content.label>

    <h1 class="text-2xl text-gray-900 leading-none flex pl-1">
      @if ($course->monthly_fee == 0.00)
        <span>FREE</span>
      @else
        <span>RM {{ $course->monthly_fee }}</span>
        <span class="text-sm ml-1 font-normal text-gray-500">per month</span>
      @endif
    </h1>
  </div>
</x-content.card>
