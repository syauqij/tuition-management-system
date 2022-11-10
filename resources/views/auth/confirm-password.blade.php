<x-guest-layout>
    <x-auth.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-nav.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-forms.validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-forms.input-label for="password" :value="__('Password')" />

                <x-forms.input-text id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-forms.button-primary>
                    {{ __('Confirm') }}
                </x-forms.button-primary>
            </div>
        </form>
    </x-auth.auth-card>
</x-guest-layout>
