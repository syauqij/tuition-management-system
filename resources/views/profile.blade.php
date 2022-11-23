<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('My Profile') }}
      </h2>
  </x-slot>
  
  <div class="py-12">
    <x-content.card>

      <div class="flex flex-col text-center w-full mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ auth()->user()->fullName }}</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please update your profile details below</p>
      </div>

      <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap m-2">
            
            <div class="p-2 w-full">
              <div class="relative">
                <x-forms.input-label for="first_name" :value="__('First Name')" />
                <x-forms.input-text id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ auth()->user()->first_name }}" />
                @error('first_name')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
              </div>
            </div>
            
            <div class="p-2 w-full">
              <div class="relative">
                <x-forms.input-label for="last_name" :value="__('Last Name')" />
                <x-forms.input-text id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ auth()->user()->last_name }}" />
                  @error('last_name')
                    <x-alerts.message type="error" :message="$message"/>
                  @enderror
              </div>
            </div>
            
            <div class="p-2 w-full">
              <div class="relative">
                <x-forms.input-label for="email" :value="__('Email')" />
                <x-forms.input-text id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" />
                @error('email')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
              </div>
            </div>
            
            <div class="p-2 w-full">
              <div class="relative">
                <x-forms.input-label for="phone_no" :value="__('Phone Number')" />
                <x-forms.input-text id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" value="{{ auth()->user()->phone_no }}" />
                @error('phone_no')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
              </div>
            </div>

            <div class="p-2 w-full flex justify-center">
              <x-forms.button-cancel class="mr-2 text-lg" :value="__('dashboard')" >
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