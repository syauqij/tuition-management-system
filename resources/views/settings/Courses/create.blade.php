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

    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap m-2">

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="name" :value="__('Course Name')" />

              <x-forms.input-text id="name" class="block mt-1 w-full" type="text" name="name"
              placeholder="E.g. Form 3 Plus" :value="old('name')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="name" :value="__('Course Photo')" />

              <x-forms.input-text id="name" class="block mt-1 w-full" type="file" name="main_photo"
              placeholder="Choose a photo" :value="old('main_photo')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="description" :value="__('Course Description')" />

              <x-forms.textarea-input id="description" class="block mt-1 w-full" type="text" name="description"
              placeholder="Describe the course details" :value="old('description')" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="subject_category" :value="__('Subject Category')" />

              <x-forms.select-input id="subject_categories" class="block mt-1 w-full" type="text" name="subject_category"
                :value="old('subject_category')"
                :options="$categories" :title="__('Subject Category')" required autofocus />

            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_subjects" :value="__('Subject')" />

            <x-forms.choices id="subjects" name="course_subjects[]"
                multiple x-data="{}" x-init="function () { choices($el) }"
                :options="$subjects" :title="__('Subjects')"
                required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="course_type" :value="__('Course Type')" />

                <x-forms.select-input id="course_type" class="block mt-1 w-full" type="text" name="type"
                :options="$courseTypes" :title="__('Course Type')" :value="old('type')"
                :enum="true" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="month_fee" :value="__('Monthly Fee (RM)')" />

              <x-forms.input-text id="monthly_fee" class="block mt-1 w-full" type="text" name="monthly_fee"
                placeholder="E.g. 150" :value="old('monthly_fee')" required autofocus />
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
