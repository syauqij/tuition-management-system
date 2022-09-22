<x-guest-layout>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <x-column-text>
        <x-slot:title>
          Forgot your password?
        </x-slot>

        No problem. Just let us know your email address and we will email you a password 
        reset link that will allow you to choose a new one.

      </x-column-text>
      
      <x-auth-card>
          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />

          <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <!-- Email Address -->
              <div class="relative mb-4"">
                  <x-input-label for="email" :value="__('Email')" />

                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
              </div>

              <x-primary-button class="w-full">
                {{ __('Email Password Reset Link') }}
              </x-primary-button>

          </form>
      </x-auth-card>
    </div>
  </section>
</x-guest-layout>
