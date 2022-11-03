<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('My Profile') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  @include('layouts.flash-message')
                  <form method="POST" autocomplete="off" action="{{ route('profile.update') }}">
                      @method('PUT')
                      @csrf
                      <div class="grid grid-cols-2 gap-2">
 
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-input-text id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ auth()->user()->first_name }}" />
                            @error('first_name')
                              <x-alert-message type="error" :message="$message"/>
                            @enderror
                        </div>
                        
                        <div>
                          <x-input-label for="last_name" :value="__('Last Name')" />
                          <x-input-text id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ auth()->user()->last_name }}" />
                            @error('last_name')
                              <x-alert-message type="error" :message="$message"/>
                            @enderror
                          </div>
                          
                          <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-input-text id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" />
                            @error('email')
                              <x-alert-message type="error" :message="$message"/>
                            @enderror
                          </div>

                          <div>
                              <x-input-label for="phone_no" :value="__('Phone Number')" />
                              <x-input-text id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" value="{{ auth()->user()->phone_no }}" />
                              @error('phone_no')
                                <x-alert-message type="error" :message="$message"/>
                              @enderror
                          </div>
                      </div>
                      <div class="flex items-center justify-end mt-4">
                          <x-primary-button class="ml-3">
                              {{ __('Update') }}
                          </x-primary-button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>