<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Settings') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">

                <div class="flex flex-col md:w-1/2 md:pl-12">
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
                              
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
