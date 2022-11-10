<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Subject') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <x-content.card>

      <div class="flex flex-col text-center w-full mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $subject->name}}</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please update the subject details below</p>
      </div>

      <!-- Validation Errors -->
      <x-forms.validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('subjects.update',$subject->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap m-2">
            
            <div class="p-2 w-full">
              <div class="relative">
                <x-forms.input-label for="subject_name" :value="__('Subject Name')" />

                <x-forms.input-text id="subject_name" class="block mt-1 w-full" type="text" name="name" 
                placeholder="E.g. Geography" :value="$subject->name" required autofocus />
              </div>
            </div>

            <div class="p-2 w-full flex justify-center">
              <x-forms.button-cancel class="mr-2 text-lg" :value="__('subjects.index')" >
                {{ __('Cancel') }}
              </x-forms.button-cancel>

              <x-forms.button-primary class="text-lg">
                {{ __('Update') }}
              </x-forms.button-primary>
            </div>

          </div>
        </div>
      
      </form>
    </x-content.card>
  </div>
</x-app-layout>