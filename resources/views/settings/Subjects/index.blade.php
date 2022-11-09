<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Subjects') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <x-card>
      <div class="flex flex-col text-center w-full mb-10">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Manage Subject</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please select the subject below to edit or 
          <x-auth-link :value="__('Create New Subject')" href="{{ route('subjects.create') }}" /></p>
      </div>

      @include('layouts.flash-message')

      @foreach ($subjects as $subject)
        <p> {{ $loop->index+1 . ") " }} 
            <x-auth-link :value="$subject->name" href="{{ route('subjects.edit', $subject->id) }}" /> 
        </p>
      @endforeach
    </x-card>
  </div>
</x-app-layout>