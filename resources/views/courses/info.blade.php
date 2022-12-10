<x-content.card contentClasses="bg-sky-100">
  <div class="items-center">
    <div class="grid gap-y-2 grid-cols-1 lg:grid-cols-3">
      <div class="lg:col-span-2">
        <span class="text-xs py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-800 text-white">
          FREE {{-- To add new Price data --}}
        </span>
        <span class="text-sm py-1 px-1.5 font-mono text-gray">
          Course
        </span>
        <p class="text-4xl md:text-3xl title-font font-bold tracking-tight mt-4 mb-4">
          {{ $course->name }}
        </p>
        <div class="lg:w-7/12 text-justify">
          Learn the basics of Python 3, one of the most powerful, versatile, and in-demand programming languages today.
        </div>
        <div class="justify-bottom">
          @if (isset($enrol) == false)
            <a href=" {{ route('enrolments.create', [
                'course_id' => $course->id
              ]) }} " >
              <x-forms.button-primary class="mt-4">
                {{ __('Enroll') }}
              </x-forms.button-primary>
            </a>
          @endif
      </div>
      </div>
      <div class="">
        <img src="https://mdbootstrap.com/img/new/standard/city/041.jpg"
                class=""
                alt="..."/>
      </div>
    </div>
  </div>
</x-content.card>

<x-content.card contentClasses="bg-gray-100">


</x-content.card>
