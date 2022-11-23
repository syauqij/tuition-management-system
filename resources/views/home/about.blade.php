@section('title')
  TMS - About Us
@stop

<x-guest-layout>
  <div class="container px-5 py-20 mx-auto">
    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="text-5xl xl:text-6xl font-bold tracking-tight mb-12">Get to Know Us</h1>
      <p class="text-2xl font-medium mb-4">We’re here to help students get
        <span class="text-indigo-600">better grades</span> in school</p>
      <p class="lg:w-4/5 w-full leading-relaxed text-gray-500 text-xl">
        Based in Cyberjaya we are rapidly growing since our humble beginning in January 2020
        <br class="hidden lg:inline-block">and nothing makes us prouder than seeing our users improve their academic performance.
      </p>
    </div>
    <div class="mx-auto flex px-5 py-4 md:flex-row flex-col items-center">
      <div class="flex flex-wrap w-full">
        <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">
                Enabling Education Through Technology
              </h2>
              <p class="leading-relaxed">
                Technology helps scale our educational reach and make it possible to connect with students around the country regardless of location.
              </p>
            </div>
          </div>
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">
                Creating Personalised Education Experiences
              </h2>
              <p class="leading-relaxed">
                Every child is unique, and each one is learning differently. We design our solution to adapt to the learning needs of every child.
              </p>
            </div>
          </div>
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">
                Making Education Fun
              </h2>
              <p class="leading-relaxed">
                We deliver an enjoyable and interactive learning experience because we believe this will help students retain information better.
              </p>
            </div>
          </div>
          <div class="flex relative">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">
                Supporting the National Education Philosophy
              </h2>
              <p class="leading-relaxed">
                We work hand-in-hand with teachers and schools towards developing Malaysian citizens who are knowledgeable, competent and able to contribute to the harmony and betterment of society.
              </p>
            </div>
          </div>
        </div>
        <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" 
          src="{{url('/assets/about-us.jpg')}}" alt="step">
      </div>
    </div>
  </div>
</x-guest-layout>