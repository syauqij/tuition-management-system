<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('My Profile') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ auth()->user() }}
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <x-auth-validation-errors class="mb-4"/>
                  {{-- <x-success-message /> --}}

                  <form method="POST" autocomplete="off" action="{{ route('profile.update') }}">
                      @method('PUT')
                      @csrf
                      <div class="grid grid-cols-2 gap-2">
 
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input required id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ auth()->user()->first_name }}" autofocus />
                        </div>

                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input required id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ auth()->user()->last_name }}" autofocus />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input required id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" autofocus />
                        </div>

                        <div>
                            <x-input-label for="new_password" :value="__('New password')" />
                            <x-text-input required id="new_password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      autocomplete="new-password" />
                        </div>
                        <div>
                            <x-input-label for="confirm_password" :value="__('Confirm password')" />
                            <x-text-input required id="confirm_password" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation"
                                      autocomplete="confirm-password" />
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