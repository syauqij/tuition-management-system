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

      <div class="flex flex-wrap lg:px-10 sm:mx-auto sm:mb-2 -mx-2">
        @foreach ($subjectCategories as $category)
        <x-content.setting-card width="md:w-1/2 lg:w-1/4" align="p-2 justify-center">
            <x-content.link :value="$category->name" href="{{ route('subject-categories.edit', $category->id)}}" />
        </x-content.setting-card>
        @endforeach
      </div>
      
    </x-content.card>
  </div>
</x-app-layout>