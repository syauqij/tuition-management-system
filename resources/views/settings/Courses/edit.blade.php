<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Course') }}
      </h2>
  </x-slot>

  <x-content.card>

    <div class="flex flex-col text-center w-full mb-4">
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
              <x-forms.input-label for="course_subject" :value="__('Subject')" />

              <x-forms.select-input id="subjects" class="block mt-1 w-full" type="text" name="subject_id"
                :options="$subjects" :title="__('Subject')" :value="$course->subject_id" required autofocus />

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
