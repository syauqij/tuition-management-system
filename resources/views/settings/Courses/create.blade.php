<x-app-layout>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/choices.css')}}"
  @endpush

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create Course') }}
      </h2>
  </x-slot>

  <x-content.card contentClasses='pb-20'>

    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">New Course</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter the new course details below</p>
    </div>

    <form method="POST" action="{{ route('courses.store') }}">
      @csrf

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap m-2">

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_name" :value="__('Course Name')" />

              <x-forms.input-text id="course_name" class="block mt-1 w-full" type="text" name="course_name"
              placeholder="E.g. Geography" :value="old('course_name')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_description" :value="__('Course Description')" />

              <x-forms.textarea-input id="course_description" class="block mt-1 w-full" type="text" name="course_description"
              placeholder="Describe the course details" :value="old('course_description')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_subject_category" :value="__('Subject Category')" />

              <x-forms.select-input id="subject_categories" class="block mt-1 w-full" type="text" name="course_subject_category"
                :options="$categories" :title="__('Subject Category')" required autofocus />

            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_subject" :value="__('Subject')" />

            <x-forms.choices id="subjects" name="course_subjects[]"
                multiple x-data="{}" x-init="function () { choices($el) }"
                :options="$subjects" :title="__('Subjects')"
                required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_subject" :value="__('Monthly Fee')" />

              <x-forms.input-text id="course_monthly_fee" class="block mt-1 w-full" type="text" name="course_monthly_fee"
                placeholder="E.g. RM 150" :value="old('course_monthly_fees')" required autofocus />
            </div>
          </div>

          <div class="pt-4 w-full flex justify-end">
            <x-forms.button-cancel class="mr-2" :value="__('courses.index')" >
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
