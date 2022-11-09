<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Subject Category') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <x-card>

      <div class="flex flex-col text-center w-full mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">New Category</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter the new subject category details below</p>
      </div>

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('subject-categories.store') }}">
        @csrf

        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap m-2">
            
            <div class="p-2 w-full">
              <div class="relative">
                <x-input-label for="category_name" :value="__('Category Name')" />

                <x-input-text id="category_name" class="block mt-1 w-full" type="text" name="category_name" 
                placeholder="E.g. Languages" :value="old('category_name')" required autofocus />
              </div>
            </div>

            <div class="p-2 w-full flex justify-center">
              <x-button-cancel class="mr-2 text-lg" :value="__('subject-categories.index')" >
                {{ __('Cancel') }}
              </x-button-cancel>

              <x-button-primary class="text-lg">
                {{ __('Create') }}
              </x-button-primary>
            </div>

          </div>
        </div>
      
      </form>
    </x-card>
  </div>
</x-app-layout>