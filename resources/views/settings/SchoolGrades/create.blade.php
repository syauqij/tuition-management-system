<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('School Grade') }}
      </h2>
  </x-slot>

  <x-content.card>
    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">New School Grade</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter the new grade details below</p>
    </div>

    <form method="POST" action="{{ route('school-grades.store') }}">
      @csrf

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap m-2">

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="grade_name" :value="__('Grade Name')" />

              <x-forms.input-text id="grade_name" class="block mt-1 w-full" type="text" name="name"
              placeholder="E.g. Year 5 or Form 5" :value="old('name')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="grade_group" :value="__('Grade Group')" />

              <x-forms.input-text id="grade_group" class="block mt-1 w-full" type="text" name="group"
              placeholder="E.g. Primary School or Secondary School" :value="old('group')" required autofocus />
            </div>
          </div>

          <div class="pt-4 w-full flex justify-end">
            <x-forms.button-cancel class="mr-2" :value="__('school-grades.index')" >
              {{ __('Cancel') }}
            </x-forms.button-cancel>

            <x-forms.button-primary>
              {{ __('Create') }}
            </x-forms.button-primary>
          </div>

        </div>
      </div>

    </form>
  </x-content.card>
</x-app-layout>
