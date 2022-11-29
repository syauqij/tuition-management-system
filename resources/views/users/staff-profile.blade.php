<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('My Profile') }}
      </h2>
  </x-slot>

  <form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

  <!-- Personal Details -->

  <x-content.card>
    <div class="grid gap-4 gap-y-2 px-4 grid-cols-1 lg:grid-cols-3">
      <div class="text-gray-600">
        <p class="font-medium text-lg">Personal Details</p>
        <p>Please fill out your personal details here.</p>
      </div>

      <div class="lg:col-span-2">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
          <div class="md:col-span-3">
            <x-forms.input-label for="first_name" :value="__('First Name')" />
            <x-forms.input-text id="first_name" class="block mt-1 w-full" type="text" name="first_name"
              value="{{ old('first_name') ?? $user->first_name }}" />
            @error('first_name')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
          </div>

          <div class="md:col-span-3">
            <x-forms.input-label for="last_name" :value="__('Last Name')" />
            <x-forms.input-text id="last_name" class="block mt-1 w-full" type="text" name="last_name"
              value="{{ old('last_name') ?? $user->last_name }}" />
            @error('last_name')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
          </div>

          <div class="md:col-span-2">
            <x-forms.input-label for="mykad" :value="__('MyKad')" />
            <x-forms.input-text id="mykad" class="block mt-1 w-full" type="number" name="mykad"
              value="{{ old('mykad') ?? (isset($user->staffProfile->mykad) ? $user->staffProfile->mykad : '') }} " />
            @error('mykad')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
          </div>

          <div class="md:col-span-2">
            <x-forms.input-label for="birthdate" :value="__('Birthdate')" />
            <x-forms.input-text id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
              value="{{ old('birthdate') ?? (isset($user->staffProfile->birthdate) ? $user->staffProfile->birthdate : '') }}" />
            @error('birthdate')

            @enderror
          </div>

          <div class="md:col-span-2">
            <x-forms.input-label class="mb-1" for="gender" :value="__('Gender')" />
            <ul class="grid gap-2 grid-cols-2 mb-2">
                <li>
                    <x-forms.radio-input id="gender_male" class="hidden peer" type="radio" name="gender"
                      :selectedGender="isset($user->staffProfile->gender) ? $user->staffProfile->gender : '' "
                      value="male" autofocus />
                    <x-forms.radio-label class="text-center" for="gender_male" :value="__('Male')" />
                </li>
                <li>
                    <x-forms.radio-input id="gender_female" class="hidden peer" type="radio" name="gender"
                      :selectedGender="isset($user->staffProfile->gender) ? $user->staffProfile->gender : '' "
                      value="female" autofocus />
                    <x-forms.radio-label class="text-center" for="gender_female" :value="__('Female')" />
                </li>
            </ul>
            @error('gender')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
          </div>

          <div class="md:col-span-5">
            <x-forms.input-label for="street_1" :value="__('Address / Street 1')" />
            <x-forms.input-text id="street_1" class="block mt-1 w-full" type="text" name="street_1"
              value="{{ old('street_1') ?? (isset($user->staffProfile->street_1) ? $user->staffProfile->street_1 : '') }}"  />
              @error('street_1')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
          </div>

          <div class="md:col-start-1 md:col-span-5">
            <x-forms.input-label for="street_2" :value="__('Street 2')" />
            <x-forms.input-text id="street_2" class="block mt-1 w-full" type="text" name="street_2"
              value="{{ old('street_2') ?? (isset($user->staffProfile->street_2) ? $user->staffProfile->street_2 : '') }}" />
              @error('street_2')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
          </div>

          <div class="md:col-span-1">
            <x-forms.input-label for="postocde" :value="__('Postcode')" />
            <x-forms.input-text id="postocde" class="block mt-1 w-full" type="text" name="postcode"
              value="{{ old('postcode') ?? (isset($user->staffProfile->postcode) ? $user->staffProfile->postcode : '') }}" />
              @error('postcode')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
          </div>

          <div class="md:col-span-2">
            <x-forms.input-label for="city" :value="__('City')" />
            <x-forms.input-text id="city" class="block mt-1 w-full" type="text" name="city"
              value="{{ old('city') ?? (isset($user->staffProfile->city) ? $user->staffProfile->city : '') }}" />
              @error('city')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
          </div>

          <div class="md:col-span-2">
            <x-forms.input-label for="state" :value="__('State')" />
            <x-forms.input-text id="state" class="block mt-1 w-full" type="text" name="state"
              value="{{ old('state') ?? (isset($user->staffProfile->state) ? $user->staffProfile->state : '') }}" />
              @error('state')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
          </div>

          <div class="md:col-span-2">
            <x-forms.input-label for="country" :value="__('Country')" />
            <x-forms.input-text id="country" class="block mt-1 w-full" type="text" name="country"
              value="{{ old('country') ?? (isset($user->staffProfile->country) ? $user->staffProfile->country : '') }}" />
              @error('country')
                <x-alerts.message type="error" :message="$message" />
              @enderror
          </div>
        </div>
      </div>
    </div>
  </x-content.card>


  <!-- Account Details -->
  @include('users.account')

  <div class="text-right py-5">
    <x-forms.button-primary class="uppercase">
      {{ __('Update') }}
    </x-forms.button-primary>
  </div>

  </form>
</x-app-layout>
