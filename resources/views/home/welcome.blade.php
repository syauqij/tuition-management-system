@section('title')
  Tuition Management System (TMS)
@stop

<x-guest-layout>
  <!-- Intro -->
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="svg absolute hidden lg:block" style="height: 560px; width: 100%; z-index: -10; overflow: hidden">
      <defs>
        <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
          <stop stop-color="hsl(217, 102%, 99%)" offset="0%"></stop>
          <stop stop-color="hsl(217,88%, 93%)" offset="100%"></stop>
        </linearGradient>
      </defs>
      <path fill="url(#sw-gradient-0)"
        d="M 0.351 264.418 C 0.351 264.418 33.396 268.165 47.112 270.128 C 265.033 301.319 477.487 325.608 614.827 237.124 C 713.575 173.504 692.613 144.116 805.776 87.876 C 942.649 19.853 1317.845 20.149 1440.003 23.965 C 1466.069 24.779 1440.135 24.024 1440.135 24.024 L 1440 0 L 1360 0 C 1280 0 1120 0 960 0 C 800 0 640 0 480 0 C 320 0 160 0 80 0 L 0 0 L 0.351 264.418 Z">
      </path>
    </svg>

    <div class="px-6 py-12 lg:my-12 md:px-12 text-gray-800 text-center lg:text-left">
      <div class="container mx-auto xl:px-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
          <div class="mt-12 lg:mt-0">
            <h1 class="text-5xl xl:text-6xl font-bold tracking-tight mb-12">Study Anytime<br/> <span class="text-indigo-800">Study Anywhere</span></h1>
            <div class="mb-12 text-xl xl:text-2xl font-medium">
              With TMS education no longer needs to be restricted by location and time
            </div>
              <a href=" {{ route('courses') }} " >
                <x-forms.button-primary class="py-4">
                  {{ __('Get Started') }}
                </x-forms.button-primary>
              </a>
              <a data-mdb-ripple="true" data-mdb-ripple-color="light" href="javascript: scrollToStats();" role="button">
                <x-forms.button-secondary class="py-4">
                  {{ __('Learn More') }}
                </x-forms.button-secondary>
              </a>
          </div>
          <div class="mb-12 lg:mb-0">
            <img src="{{url('/assets/intro.webp')}}"
              class="w-full rounded-lg shadow-lg"/>
          </div>
        </div>
      </div>
    </div>

  <div class="container my-20 px-6 mx-auto">
    <!-- Statistics -->
    <div id="stats" class="text-center">
      <h1 class="text-3xl font-bold mb-12">
        The <span class="text-indigo-800">FASTEST</span> Growing Online Tuition in Malaysia
        <br class="hidden lg:inline-block pt-1">with 59,658 active students and counting
      </h1>
      <div class="grid grid-cols-2 gap-x-6 lg:gap-x-12 md:grid-cols-4">
        <div class="mb-12 md:mb-0">
          <h2 class="text-5xl font-bold display-5 text-cyan-600 mb-4">570</h2>
          <h5 class="text-lg font-medium text-gray-500 mb-4">Classes Per Month</h5>
        </div>

        <div class="mb-12 md:mb-0">
          <h2 class="text-5xl font-bold display-5 text-cyan-600 mb-4">1,209</h2>
          <h5 class="text-lg font-medium text-gray-500 mb-4">Professional Tutors</h5>
        </div>

        <div class="mb-12 md:mb-0">
          <h2 class="text-5xl font-bold display-5 text-cyan-600 mb-4">59</h2>
          <h5 class="text-lg font-medium text-gray-500 mb-4">Professional Tutors</h5>
        </div>

        <div class="mb-12 md:mb-0">
          <h2 class="text-5xl font-bold display-5 text-cyan-600 mb-4">125</h2>
          <h5 class="text-lg font-medium text-gray-500 mb-4">Dedicated Crews</h5>
        </div>
      </div>
    </div>

    <!-- Features Overview -->
    <div class="py-8 mx-auto">
      <div class="flex flex-wrap md:-m-4">
        <div class="p-4 md:w-1/2 lg:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Quality Content</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">
                Aligned To Malaysian National Curriculum from MOE
              </p>
            </div>
          </div>
        </div>
        <div class="p-4 w-1/2 lg:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Personalised Learning</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">
                Based on Individual Capabilities and Progress
              </p>
            </div>
          </div>
        </div>
        <div class="p-4 w-1/2 lg:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                  </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Detailed Report Card</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">
                Continuously Identify Areas of Improvement
              </p>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/2 lg:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Topical Test & Exam</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">
                With Detailed Explanation and Step-by-Step Solution
              </p>
            </div>
          </div>
        </div>
        <div class="p-4 w-1/2 lg:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Gamified Quiz</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">
                Motivate Students to Achieve Their Learning Goals
              </p>
            </div>
          </div>
        </div>
        <div class="p-4 w-1/2 lg:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Competition Preparation</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">
                Practice for National & International Competitions
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Why TMS -->
    <div class="py-20 mx-auto">
      <div class="block rounded-lg shadow-lg bg-white">
        <div class="flex flex-wrap items-center">
          <div class="grow-0 shrink-0 basis-auto block w-full lg:flex lg:w-6/12 xl:w-5/12">
            <img src="{{url('/assets/why-tuition+.png')}}" alt="Trendy Pants and Shoes"
              class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
          </div>
          <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 xl:w-7/12">
            <div class="px-5 py-12 lg:py-0 md:px-8 lg:px-12">
              <h2 class="text-2xl md:text 2xl lg:text-3xl font-bold mb-6">
                Why Choose <span class="text-indigo-800">TMS</span>?</h2>
              <p class="mb-6 2xl:w-4/5">
                Looking for reliable tuition services to get exam ready? No more Googling “tuition centres near me”. One of the top online tuition centres in Malaysia is here to help you.
              </p>

              <div class="grid md:grid-cols-2 gap-x-6">
                <div class="mb-6">
                  <p class="flex items-center text-gray-900 title-font font-medium">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                      </path>
                    </svg>
                    Live & Interactive Learning
                  </p>
                </div>

                <div class="mb-6">
                  <p class="flex items-center text-gray-900 title-font font-medium">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                      </path>
                    </svg>
                    Flexible Timings
                  </p>
                </div>

                <div class="mb-6">
                  <p class="flex items-center text-gray-900 title-font font-medium">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                      </path>
                    </svg>
                    Customized Study Plans
                  </p>
                </div>

                <div class="mb-6">
                  <p class="flex items-center text-gray-900 title-font font-medium">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                      </path>
                    </svg>
                    Parental Engagement
                  </p>
                </div>

                <div class="mb-6">
                  <p class="flex items-center text-gray-900 title-font font-medium">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                      </path>
                    </svg>
                    Outstanding Tutors and Guaranteed Results
                  </p>
                </div>

                <div class="mb-6">
                  <p class="flex items-center text-gray-900 title-font font-medium">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                      </path>
                    </svg>
                    Quick Sign Up and Response
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Testimonials-->
    <div class="px-5 py-4 mx-auto">
      <div class="text-center mb-20">
        <h1 class="sm:text-3xl text-2xl font-bold title-font text-gray-900 mb-4">Testimonials</h1>
        <p class="text-base leading-relaxed lg:w-3/4 mx-auto text-gray-500">
          TMS helped 59,658 Malaysian students practise and complete 164,188 questions since January 2020
        </p>
      </div>
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
        <div class="p-4 md:w-1/2 w-full">
          <div class="h-full bg-violet-200 p-8 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-indigo-800 mb-4" viewBox="0 0 975.036 975.036">
              <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
            </svg>
            <p class="leading-relaxed mb-6">
              My sister and I use TMS to get quizzes and mock exams. The best thing is... we can learn from our mistakes!
            </p>
            <a class="inline-flex items-center">
              <span class="flex-grow flex flex-col">
                <span class="title-font font-medium text-gray-900">Sarah</span>
                <span class="text-gray-800 text-sm">Form 5 Student</span>
              </span>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/2 w-full">
          <div class="h-full bg-violet-300 p-8 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-indigo-800 mb-4" viewBox="0 0 975.036 975.036">
              <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
            </svg>
            <p class="leading-relaxed mb-6">
              TMS allows me to track my son's progress and performance, so I know which areas he needs more help with.
            </p>
            <a class="inline-flex items-center">
              <span class="flex-grow flex flex-col">
                <span class="title-font font-medium text-gray-900">Fatimah</span>
                <span class="text-gray-800 text-sm">Parent</span>
              </span>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/2 w-full">
          <div class="h-full bg-violet-200 p-8 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-indigo-800 mb-4" viewBox="0 0 975.036 975.036">
              <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
            </svg>
            <p class="leading-relaxed mb-6">
              Every year, I participate in the Kangaroo Math Competition. With TMS, I can easily prepare for the competition.
            </p>
            <a class="inline-flex items-center">
              <span class="flex-grow flex flex-col">
                <span class="title-font font-medium text-gray-900">Johan</span>
                <span class="text-gray-800 text-sm">Form 5 Student</span>
              </span>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/2 w-full">
          <div class="h-full bg-violet-300 p-8 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-indigo-800 mb-4" viewBox="0 0 975.036 975.036">
              <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
            </svg>
            <p class="leading-relaxed mb-6">
              My students like to use TMS to learn every day and anywhere at their convenient time.
            </p>
            <a class="inline-flex items-center">
              <span class="flex-grow flex flex-col">
                <span class="title-font font-medium text-gray-900">Richard</span>
                <span class="text-gray-800 text-sm">Teacher</span>
              </span>
            </a>
          </div>
        </div>

        <div class="p-4 md:w-1/2 w-full">
          <div class="h-full bg-violet-200 p-8 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-indigo-800 mb-4" viewBox="0 0 975.036 975.036">
              <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
            </svg>
            <p class="leading-relaxed mb-6">
              What I love most is I can track my performance through my own personal Report Card and Score Card!
            </p>
            <a class="inline-flex items-center">
              <span class="flex-grow flex flex-col">
                <span class="title-font font-medium text-gray-900">Natalie</span>
                <span class="text-gray-800 text-sm">Form 4 Student</span>
              </span>
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/2 w-full">
          <div class="h-full bg-violet-300 p-8 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-indigo-800 mb-4" viewBox="0 0 975.036 975.036">
              <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
            </svg>
            <p class="leading-relaxed mb-6">
              What I love most is I can track my performance through my own personal Report Card and Score Card!
            </p>
            <a class="inline-flex items-center">
              <span class="flex-grow flex flex-col">
                <span class="title-font font-medium text-gray-900">Zhu Yan</span>
                <span class="text-gray-800 text-sm">Parent</span>
              </span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</x-guest-layout>

<script type="text/javascript">
  function scrollToStats() {
    document.querySelector('#stats').scrollIntoView({behavior: 'smooth'});
  }
</script>
