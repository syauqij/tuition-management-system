<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Subject Category') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <x-card>

      <div class="flex flex-col text-center w-full mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $subjectCategory->name}}</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please update the subject category details below</p>
      </div>

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('subject-categories.update',$subjectCategory->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap m-2">
            
            <div class="p-2 w-full">
              <div class="relative">
                <x-input-label for="category_name" :value="__('Category Name')" />

                <x-input-text id="category_name" class="block mt-1 w-full" type="text" name="name" 
                placeholder="E.g. Languages" :value="$subjectCategory->name" required autofocus />
              </div>
            </div>

            <div class="p-2 w-full">
              <x-button-primary class="flex mx-auto text-lg">
                {{ __('Update') }}
              </x-button-primary>
            </div>

          </div>
        </div>
      
      </form>
    </x-card>
  </div>
</x-app-layout>