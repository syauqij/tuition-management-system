<x-guest-layout>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto flex flex-wrap items-top justify-between">
      <x-column-text>
        <x-slot:title>
          Register an account
        </x-slot>

        Poke slow-carb mixtape knausgaard, typewriter street art gentrify hammock starladder roathse. 
        Craies vegan tousled etsy austin.

        <img class="object-cover object-center rounded-lg md:mt-4 mt-12" 
        src="https://dummyimage.com/1200x500" alt="step">
      </x-column-text>

      <x-auth-card>

          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />

          <form method="POST" action="{{ route('register') }}">
              @csrf
              
              <x-input-label class="mb-1" for="role" :value="__('Signing up as ')" />
              <ul class="grid gap-2 grid-cols-2 mb-2">
                  <li>
                      {{-- <input type="checkbox" name="ielts" value="IELTS" {{ old('ielts') == "IELTS" ? 'checked' : '' }}> --}}
                      <x-radio-input id="role-parent" class="hidden peer" type="radio" name="role" :value="__('parent')" checked required autofocus />
                      
                      <x-radio-label class="text-center" for="role-parent" :value="__('Parent')" />
                  </li>
                  <li>
                      <x-radio-input id="role-student" class="hidden peer" type="radio" name="role" :value="__('student')" required autofocus />
                        
                      <x-radio-label class="text-center" for="role-student" :value="__('Student')" />
                  </li>
              </ul>
      
              <!-- First Name -->
              <div class="relative mb-4">
                  <x-input-label for="first_name" :value="__('First Name')" />

                  <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" 
                  placeholder="E.g. Mohd Zaky" :value="old('first_name')" required autofocus />
              </div>

              <!-- Last Name -->
              <div class="relative mb-4">
                  <x-input-label for="last_name" :value="__('Last Name')" />

                  <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" 
                  placeholder="E.g. Yahaya" :value="old('last_name')" required autofocus />
              </div>

              <!-- Email Address -->
              <div class="relative mb-4">
                  <x-input-label for="email" :value="__('Email')" />

                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" 
                  placeholder="mohdzaky.yahaya@gmail.com" :value="old('email')" required />
              </div>

              <!-- Password -->
              <div class="relative mb-4">
                  <x-input-label for="password" :value="__('Password')" />

                  <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
              </div>

              <!-- Phone Number -->
              <div class="relative mb-4">
                <x-input-label for="phone_no" :value="__('Phone Number')" />

                <x-text-input id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" :value="old('phone_no')" required />
              </div>
              
              <x-primary-button class="w-full">
                {{ __('Register') }}
              </x-primary-button>

              <p class="text-xs text-gray-500 mt-3"> Already have an account?  
                <x-auth-link :value="__('Sign in')" href="{{ route('login') }}" />
              </p>

          </form>
      </x-auth-card>
    </div>
  </section>
</x-guest-layout>