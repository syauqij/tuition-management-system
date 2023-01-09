<x-app-layout>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('css/choices.css')}}"
  @endpush

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Course') }}
      </h2>
  </x-slot>

  <x-content.card contentClasses='pb-20'>

    <div class="flex flex-col text-center w-full mb-4 pb-">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $course->name }}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter the new course details below</p>
    </div>

    <!-- Validation Errors -->
    <x-forms.validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('courses.update',$course->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap m-2">

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_name" :value="__('Course Name')" />

              <x-forms.input-text id="course_name" class="block mt-1 w-full" type="text" name="name"
              placeholder="E.g. Geography" :value="$course->name" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="name" :value="__('Course Photo')" />

              <x-forms.input-text id="name" class="block mt-1 w-full" type="file" name="main_photo"
              placeholder="Choose a photo" :value="old('main_photo')" autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_description" :value="__('Course Description')" />

              <x-forms.textarea-input id="course_description" class="block mt-1 w-full" type="text" name="description"
              placeholder="Describe the course details" :value="$course->description" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_subject_category" :value="__('Subject Category')" />

              <x-forms.select-input id="subject_categories" class="block mt-1 w-full" type="text" name="subject_category_id"
                :options="$categories" :title="__('Subject Category')" :value="$course->subject_category_id" required autofocus />
            </div>
          </div>

          <div class="p-2 w-full">
            <div class="relative">
              <x-forms.input-label for="course_subject" :value="__('Subjects')" />

              <x-forms.choices id="subjects" name="course_subjects[]"
                multiple x-data="{}" x-init="function () { choices($el) }"
                :options="$subjects" :title="__('Subjects')" :selected="$selectedSubjects"
                required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="course_type" :value="__('Course Type')" />

                <x-forms.select-input id="course_type" class="block mt-1 w-full" type="text" name="type"
                :options="$courseTypes" :title="__('Course Type')" :value="$course->type"
                :enum="true" required autofocus />
            </div>
          </div>

          <div class="p-2 w-1/2">
            <div class="relative">
              <x-forms.input-label for="monthly_fee" :value="__('Monthly Fee (RM)')" />

              <x-forms.input-text id="monthly_fee" class="block mt-1 w-full" type="text" name="monthly_fee"
                placeholder="E.g. 150" :value="$course->monthly_fee" required autofocus />
            </div>
          </div>

          <div class="pt-4 w-full flex justify-end">
            <x-forms.button-cancel class="mr-2" :value="__('courses.index')" >
              {{ __('Cancel') }}
            </x-forms.button-cancel>

            <x-forms.button-primary>
              {{ __('Update') }}
            </x-forms.button-primary>
          </div>

        </div>
      </div>

    </form>
  </x-content.card>
</x-app-layout>
