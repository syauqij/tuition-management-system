<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Settings') }}
      </h2>
  </x-slot>

  <div class="py-12">
    
      <x-card>
        <div class="container px-5 py-5 mx-auto">

          <div class="flex flex-col text-center w-full mb-10">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Manage Settings</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please select the type of setting to manage below</p>
          </div>

          <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">

            <div class="p-2 sm:w-1/2 w-full">
              <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                  <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                  <path d="M22 4L12 14.01l-3-3"></path>
                </svg>
                <span class="title-font font-medium">
                  <x-auth-link :value="__('Subject Categories')" href="{{ route('subject-categories.index') }}" />
                </span>
              </div>
            </div>

            <div class="p-2 sm:w-1/2 w-full">
              <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                  <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                  <path d="M22 4L12 14.01l-3-3"></path>
                </svg>
                <span class="title-font font-medium">
                  <x-auth-link :value="__('Subjects')" href="{{ route('subjects.index') }}" />
                </span>
              </div>
            </div>

            <div class="p-2 sm:w-1/2 w-full">
              <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                  <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                  <path d="M22 4L12 14.01l-3-3"></path>
                </svg>
                <span class="title-font font-medium">
                  <x-auth-link :value="__('System Users')" href="" />
                </span>
              </div>
            </div>

          </div>
          
        </div>






                {{-- <div class="flex flex-col md:w-1/2 md:pl-12">
                  <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">Subject Categories</h2>
                  <nav class="flex flex-wrap list-none -mb-1">
                    <li class="lg:w-1/3 mb-1 w-1/2">
                      <x-auth-link :value="__('New Category')" href="{{ route('subject-categories.create') }}" />
                    </li>
                    <li class="lg:w-1/3 mb-1 w-1/2">
                      <x-auth-link :value="__('Edit Category')" href="{{ route('subject-categories.index') }}" />
                    </li>
                  </nav>
                </div>


                <div class="flex flex-col md:w-1/2 md:pl-12">
                  <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">Subjects</h2>
                  <nav class="flex flex-wrap list-none -mb-1">
                    <li class="lg:w-1/3 mb-1 w-1/2">
                      <x-auth-link :value="__('New Subject')" href="{{ route('subjects.create') }}" />
                    </li>
                    <li class="lg:w-1/3 mb-1 w-1/2">
                      <x-auth-link :value="__('Edit Subject')" href="{{ route('subjects.index') }}" />
                    </li>
                  </nav>
                </div>
                           

                <div class="flex flex-col md:w-1/2 md:pl-12">
                  <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">Courses</h2>
                  <nav class="flex flex-wrap list-none -mb-1">
                    <li class="lg:w-1/3 mb-1 w-1/2">
                      <x-auth-link :value="__('New Course')" href="{{ route('courses.create') }}" />
                    </li>
                    <li class="lg:w-1/3 mb-1 w-1/2">
                      <x-auth-link :value="__('Edit Course')" href="{{ route('courses.index') }}" />
                    </li>
                  </nav>
                </div>
                               --}}


      </x-card>
  </div>
</x-app-layout>
