<x-content.card>
  <div class="grid gap-4 gap-y-2 px-4 grid-cols-1 lg:grid-cols-3">
    <div class="text-gray-600">
      <p class="font-bold text-lg">Parent Details</p>
      <p>Please fill out your parent details here.</p>
    </div>

    <div class="lg:col-span-2">
      <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
        <div class="md:col-span-3">
          <x-forms.input-label for="parent_first_name" :value="__('First Name')" />
          <x-forms.input-text id="parent_first_name" class="block mt-1 w-full" type="text" name="parent_first_name"
            value="{{ $user->studentProfile->parentProfile->first_name ?? old('parent_first_name') }}"  />
          @error('parent_first_name')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-3">
          <x-forms.input-label for="parent_last_name" :value="__('Last Name')" />
          <x-forms.input-text id="parent_last_name" class="block mt-1 w-full" type="text" name="parent_last_name"
            value="{{ $user->studentProfile->parentProfile->last_name ?? old('parent_last_name') }}"  />
            @error('parent_last_name')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="parent_mykad" :value="__('MyKad')" />
          <x-forms.input-text id="parent_mykad" class="block mt-1 w-full" type="number" name="parent_mykad"
            value="{{ $user->studentProfile->parentProfile->mykad ?? old('parent_mykad')}}"  />
          @error('parent_mykad')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="parent_birthdate" :value="__('Birthdate')" />
          <x-forms.input-text id="parent_birthdate" class="block mt-1 w-full" type="date" name="parent_birthdate"
            value="{{ $user->studentProfile->parentProfile->birthdate ?? old('parent_birthdate') }}"  />
          @error('parent_birthdate')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label class="mb-1" for="gender" :value="__('Gender')" />
          <ul class="grid gap-2 grid-cols-2 mb-2">
            <li>
                <x-forms.radio-input id="parent_gender_male" class="hidden peer" type="radio" name="parent_gender"
                  :selected=" $user->studentProfile->parentProfile->gender ?? old('parent_gender') "
                  value="male" autofocus />
                <x-forms.radio-label class="text-center" for="parent_gender_male" :value="__('Male')" />
            </li>
            <li>
                <x-forms.radio-input id="parent_gender_female" class="hidden peer" type="radio" name="parent_gender"
                  :selected=" $user->studentProfile->parentProfile->gender ?? old('parent_gender') "
                  value="female" autofocus />
                <x-forms.radio-label class="text-center" for="parent_gender_female" :value="__('Female')" />
            </li>
          </ul>
          @error('parent_gender')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-3">
          <x-forms.input-label for="parent_email" :value="__('Email Address')" />
          <x-forms.input-text id="parent_email" class="block mt-1 w-full" type="text" name="parent_email"
            value="{{ $user->studentProfile->parentProfile->email ?? old('parent_email') }}"  />
            @error('parent_email')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="parent_phone_no" :value="__('Phone No.')" />
          <x-forms.input-text id="parent_phone_no" class="block mt-1 w-full" type="text" name="parent_phone_no"
            value="{{ $user->studentProfile->parentProfile->phone_no ?? old('parent_phone_no') }}"  />
            @error('parent_phone_no')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-1">
          <x-forms.input-label for="parent_relationship" :value="__('Relationship')" />
          <x-forms.input-text id="parent_relationship" class="block mt-1 w-full" type="text" name="parent_relationship"
            value="{{ $user->studentProfile->parentProfile->relationship ?? old('parent_relationship') }}"  />
            @error('parent_relationship')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-5">
          <x-forms.input-label for="parent_street_1" :value="__('Address / Street 1')" />
          <x-forms.input-text id="parent_street_1" class="block mt-1 w-full" type="text" name="parent_street_1"
            value="{{ $user->studentProfile->parentProfile->street_1 ?? old('parent_street_1') }}"  />
            @error('parent_street_1')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-start-1 md:col-span-5">
          <x-forms.input-label for="parent_street_2" :value="__('Street 2')" />
          <x-forms.input-text id="parent_street_2" class="block mt-1 w-full" type="text" name="parent_street_2"
            value="{{ $user->studentProfile->parentProfile->street_2 ?? old('parent_street_2') }}"  />
            @error('parent_street_2')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-1">
          <x-forms.input-label for="parent_postcode" :value="__('Postcode')" />
          <x-forms.input-text id="parent_postcode" class="block mt-1 w-full" type="text" name="parent_postcode"
            value="{{ $user->studentProfile->parentProfile->postcode ?? old('parent_postcode') }}"  />
            @error('parent_postcode')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="parent_city" :value="__('City')" />
          <x-forms.input-text id="parent_city" class="block mt-1 w-full" type="text" name="parent_city"
            value="{{ $user->studentProfile->parentProfile->city ?? old('parent_city') }}"  />
            @error('parent_city')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="parent_state" :value="__('State')" />
          <x-forms.input-text id="parent_state" class="block mt-1 w-full" type="text" name="parent_state"
            value="{{ $user->studentProfile->parentProfile->state ?? old('parent_state') }}"  />
            @error('parent_state')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        <div class="md:col-span-2">
          <x-forms.input-label for="parent_country" :value="__('Country')" />
          <x-forms.input-text id="parent_country" class="block mt-1 w-full" type="text" name="parent_country"
            value="{{ $user->studentProfile->parentProfile->country ?? old('parent_country') }}"  />
            @error('parent_country')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

      </div>
    </div>
  </div>
</x-content.card>
