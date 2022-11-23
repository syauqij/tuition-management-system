<x-guest-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Courses') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <x-content.card>
        <div class="container px-5 py-5 mx-auto">

          <div class="flex flex-col text-center w-full mb-10">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Courses</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please select the type of setting to manage below</p>
          </div>

          <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">

            <form action="{{ route('course.search') }}" method="GET">
              <label for="search" class="sr-only">
                  Search
              </label>
              <input type="text" name="keywords"
                  class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 
                  dark:text-gray-400"
                  placeholder="Search..." />
              <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
              </div>
            </form>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead
                  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          #
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Description
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Subject
                      </th>
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Subject Category
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($courses as $user)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row"
                          class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                          {{$user->id}}
                      </th>
                      <td class="px-6 py-4">
                          {{$user->name}}

                      </td>
                      <td class="px-6 py-4">
                          {{$user->description}}

                      </td>
                      <td class="px-6 py-4">
                          {{$user->subject->name}}

                      </td>
                      </td>
                      <td class="px-6 py-4">
                          {{$user->subjectCategory->name}}

                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{ $courses->links() }}
          </div>
          
        </div>
      </x-content.card>
  </div>
</x-guest-layout>


{{-- <x-app-layout>
  <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
          {{ __('Users') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">

                  <div class="mt-1 mb-4">
                      <div class="relative max-w-xs">
                          <form action="{{ route('users.search') }}" method="GET">
                              <label for="search" class="sr-only">
                                  Search
                              </label>
                              <input type="text" name="s"
                                  class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                  placeholder="Search..." />
                              <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                  </svg>
                              </div>
                          </form>
                      </div>

                  </div>
                  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                          <thead
                              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                              <tr>
                                  <th scope="col" class="px-6 py-3">
                                      #
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Name
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Email
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($users as $user)
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row"
                                      class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                      {{$user->id}}
                                  </th>
                                  <td class="px-6 py-4">
                                      {{$user->name}}

                                  </td>
                                  <td class="px-6 py-4">
                                      {{$user->email}}

                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{ $users->links() }}
                  </div>

              </div>
          </div>
      </div>
  </div>
</x-app-layout> --}}
