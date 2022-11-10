<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Settings') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <x-content.card>
        <div class="container px-5 py-5 mx-auto">

          <div class="flex flex-col text-center w-full mb-10">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Manage Settings</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please select the type of setting to manage below</p>
          </div>

          <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
            <x-content.setting-card>
              <x-slot:icon>
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </x-slot:icon>

                <x-content.link :value="__('Subject Category')" href="{{ route('subject-categories.index') }}" />
            </x-content.setting-card>

            <x-content.setting-card>
              <x-slot:icon>
                  <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                  <path d="M22 4L12 14.01l-3-3"></path>
              </x-slot:icon>

                <x-content.link :value="__('Subjects')" href="{{ route('subjects.index') }}" />
            </x-content.setting-card>

          </div>
          
        </div>
      </x-content.card>
  </div>
</x-app-layout>
