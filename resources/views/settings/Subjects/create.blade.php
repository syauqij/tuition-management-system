<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Subject') }}
      </h2>
  </x-slot>

  <x-content.card>

    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">New Subject</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter the new subject details below</p>
    </div>

    <form method="POST" action="{{ route('subjects.store') }}">
      @csrf

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap m-2">

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="subject_name" :value="__('Subject Name')" />

              <x-forms.input-text id="subject_name" class="block mt-1 w-full" type="text" name="subject_name"
              placeholder="E.g. Geography" :value="old('subject_name')" required autofocus />
            </div>
          </div>

          <div class="pt-4 w-full flex justify-end">
            <x-forms.button-cancel class="mr-2" :value="__('subjects.index')" >
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
