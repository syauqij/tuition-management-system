<x-content.card>
  <div class="grid gap-4 gap-y-2 px-4 grid-cols-1 lg:grid-cols-3">
    <div class="text-gray-600">
      <p class="font-bold text-lg">Personal Details</p>
      <p>Please fill out your personal details here.</p>
    </div>

    <div class="lg:col-span-2">
      <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
        <div class="md:col-span-3">
          <x-forms.input-label for="first_name" :value="__('First Name')" />
          <x-forms.input-text id="first_name" class="block mt-1 w-full" type="text" name="first_name"
          value="{{ $user->first_name ?? old('first_name')}}" />
          @error('first_name')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-3">
          <x-forms.input-label for="last_name" :value="__('Last Name')" />
          <x-forms.input-text id="last_name" class="block mt-1 w-full" type="text" name="last_name"
            value="{{ $user->last_name ?? old('last_name')}}" />
          @error('last_name')

          @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="mykad" :value="__('MyKad')" />
          <x-forms.input-text id="mykad" class="block mt-1 w-full" type="number" name="mykad"
            value="{{ $user->studentProfile->mykad ?? old('mykad')}} " />
          @error('mykad')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="birthdate" :value="__('Birthdate')" />
          <x-forms.input-text id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
            value="{{ $user->studentProfile->birthdate ?? old('birthdate')  }}" />
          @error('birthdate')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label class="mb-1" for="gender" :value="__('Gender')" />
          <ul class="grid gap-2 grid-cols-2 mb-2">
              <li>
                  <x-forms.radio-input id="gender_male" class="hidden peer" type="radio" name="gender"
                    :selected="$user->studentProfile->gender ?? old('gender') "
                    value="male" autofocus />
                  <x-forms.radio-label class="text-center" for="gender_male" :value="__('Male')" />
              </li>
              <li>
                  <x-forms.radio-input id="gender_female" class="hidden peer" type="radio" name="gender"
                    :selected="$user->studentProfile->gender ?? old('gender') "
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
            value="{{ $user->studentProfile->street_1 ?? old('street_1') }}"  />
            @error('street_1')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-start-1 md:col-span-5">
          <x-forms.input-label for="street_2" :value="__('Street 2')" />
          <x-forms.input-text id="street_2" class="block mt-1 w-full" type="text" name="street_2"
            value="{{ $user->studentProfile->street_2 ?? old('street_2')}}" />
            @error('street_2')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-1">
          <x-forms.input-label for="postocde" :value="__('Postcode')" />
          <x-forms.input-text id="postocde" class="block mt-1 w-full" type="text" name="postcode"
            value="{{ $user->studentProfile->postcode ?? old('postcode') }}" />
            @error('postcode')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="city" :value="__('City')" />
          <x-forms.input-text id="city" class="block mt-1 w-full" type="text" name="city"
            value="{{ $user->studentProfile->city ?? old('city') }}" />
            @error('city')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="state" :value="__('State')" />
          <x-forms.input-text id="state" class="block mt-1 w-full" type="text" name="state"
            value="{{ $user->studentProfile->state ?? old('state') }}" />
            @error('state')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="country" :value="__('Country')" />
          <x-forms.input-text id="country" class="block mt-1 w-full" type="text" name="country"
            value="{{ $user->studentProfile->country ?? old('country') }}" />
            @error('country')
              <x-alerts.message type="error" :message="$message" />
            @enderror
        </div>
      </div>
    </div>
  </div>
</x-content.card>
