<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Subject Categories') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <x-content.card>
      <div class="flex flex-col text-center w-full mb-10">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Manage Subject Category</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please select the category below to edit or 
          <x-content.link :value="__('Create New Category')" href="{{ route('subject-categories.create') }}" /></p>
      </div>

      @include('layouts.flash-message')

      
      <div class="container mb-10 mx-auto lg:px-10">
        <div class="flex flex-wrap">
            @foreach ($subjectCategories as $category)
              <div class="lg:w-3/12 md:w-1/2 p-2 w-full text-center">
                <a href="{{ route('subject-categories.edit', $category->id)}} ">
                  <span class="py-1 px-2 rounded bg-neutral-100 text-indigo-500 text-base font-medium tracking-widest truncate block">
                    {{ $category->name }}
                  </span>
                </a>
              </div>
            @endforeach
        </div>
      </div>
      
    </x-content.card>
  </div>
</x-app-layout>