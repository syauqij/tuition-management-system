<x-guest-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Courses') }}
    </h2>
  </x-slot>

  <div class="container px-5 py-10 mx-auto lg:w-9/12">
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
          <x-forms.button-primary class="mt-4">
            {{ __('Enroll') }}
          </x-forms.button-primary>
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

        <div class="grid gap-6 gap-y-2 grid-cols-1 lg:grid-cols-3">

          <div class="lg:col-span-2">
            <h1 class="text-3xl md:text-2xl font-bold tracking-tight mb-2">
              About this Course
            </h1>

            <div class="text-justify leading-loose">
              {{ $course->description }}
            </div>
          </div>

          <div class="bg-violet-100 px-4">
            <h1 class="text-3xl md:text-2xl font-bold tracking-tight my-2">
              Benefits
            </h1>

              <div class="mb-3">
                <p class="flex items-center text-blue-900 title-font font-medium">
                  <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                      d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                    </path>
                  </svg>
                  Live & Interactive Learning
                </p>
              </div>

              <div class="mb-3">
                <p class="flex items-center text-blue-900 title-font font-medium">
                  <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                      d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                    </path>
                  </svg>
                  Flexible Timings
                </p>
              </div>

              <div class="mb-3">
                <p class="flex items-center text-blue-900 title-font font-medium">
                  <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                      d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                    </path>
                  </svg>
                  Customized Study Plans
                </p>
              </div>
          </div>
        </div>
      </div>
    </x-content.card>
  </div>
</x-guest-layout>
