<x-content.card>
  <div class="grid gap-4 gap-y-2 px-4 grid-cols-1 lg:grid-cols-3">
    <div class="text-gray-600">
      <p class="font-medium text-lg">Account Details</p>
      <p>You may change your user account details here.</p>
    </div>

    <div class="lg:col-span-2">
      <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
        <div class="md:col-span-3">
          <x-forms.input-label for="email" :value="__('Email')" />
          <x-forms.input-text id="email" class="block mt-1 w-full" type="text" name="email" value="{{ auth()->user()->email }}" />
          @error('email')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-3">
          <x-forms.input-label for="phone_no" :value="__('Phone No.')" />
          <x-forms.input-text id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" value="{{ auth()->user()->phone_no }}" />
            @error('phone_no')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-start-1 md:col-span-3">
          <x-forms.input-label for="password" :value="__('Password')" />
          <x-forms.input-text id="password" class="block mt-1 w-full" type="password" name="password" value="" />
            @error('password')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-3">
          <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />
          <x-forms.input-text id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" value="" />
            @error('password_confirmation')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

      </div>
    </div>
  </div>
</x-content.card>
