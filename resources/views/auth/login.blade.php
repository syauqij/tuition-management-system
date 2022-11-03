<x-guest-layout>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <x-column-text>
          <x-slot:title>
            Welcome Back
          </x-slot>

          Poke slow-carb mixtape knausgaard, typewriter street art gentrify hammock starladder roathse. 
          Craies vegan tousled etsy austin.
      </x-column-text>

      <x-auth-card>
          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />

          <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Email Address -->
              <div class="relative mb-4">
                  <x-input-label for="email" :value="__('Email')" />

                  <x-input-text id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
              </div>

              <!-- Password -->
              <div class="relative mb-4">
                  <x-input-label for="password" :value="__('Password')" />

                  <x-input-text id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
              </div>

              <!-- Remember Me -->
              <div class="relative mb-4">
                  <label for="remember_me" class="inline-flex items-center">
                      <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                  </label>
              </div>

              <x-button-primary class="w-full">
                {{ __('Login') }}
              </x-button-primary>
              
              <p class="text-xs text-gray-500 mt-3"> Don't have an account? 
                <x-auth-link :value="__('Create a new one')" href="{{ route('register') }}" />
              </p>

              @if (Route::has('password.request'))
                <p class="text-xs text-gray-500 mt-1">
                  <x-auth-link :value="__('Forgot your password?')" href="{{ route('password.request') }}" />
                </p>
              @endif
          </form>
      </x-auth-card>
    </div>
  </section>
</x-guest-layout>
