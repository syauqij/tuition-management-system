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
  <div class="pt-10">
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
                
              @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="mykad" :value="__('MyKad')" />
              <x-forms.input-text id="mykad" class="block mt-1 w-full" type="mykad" name="mykad"
                value="{{ old('mykad') ?? (isset($user->studentProfile->mykad) ? $user->studentProfile->mykad : '') }} " />
              @error('mykad')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="birthdate" :value="__('Birthdate')" />
              <x-forms.input-text id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
                value="{{ old('birthdate') ?? (isset($user->studentProfile->birthdate) ? $user->studentProfile->birthdate : '') }}" />
              @error('birthdate')
                
              @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label class="mb-1" for="gender" :value="__('Gender')" />
              <ul class="grid gap-2 grid-cols-2 mb-2">
                  <li>
                      <x-forms.radio-input id="gender_male" class="hidden peer" type="radio" name="gender" 
                        :selectedGender="isset($user->studentProfile->gender) ? $user->studentProfile->gender : '' " 
                        value="male" autofocus />
                      <x-forms.radio-label class="text-center" for="gender_male" :value="__('Male')" />
                  </li>
                  <li>
                      <x-forms.radio-input id="gender_female" class="hidden peer" type="radio" name="gender"
                        :selectedGender="isset($user->studentProfile->gender) ? $user->studentProfile->gender : '' " 
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
              value="{{ isset($user->studentProfile->street_1) ? $user->studentProfile->street_1 : '' }}"  />
                @error('street_1')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>
            
            <div class="md:col-start-1 md:col-span-5">
              <x-forms.input-label for="street_2" :value="__('Street 2')" />
              <x-forms.input-text id="street_2" class="block mt-1 w-full" type="text" name="street_2"
                value="{{ isset($user->studentProfile->street_2) ? $user->studentProfile->street_2 : '' }}" />
                @error('street_2')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-1">
              <x-forms.input-label for="postocde" :value="__('Postcode')" />
              <x-forms.input-text id="postocde" class="block mt-1 w-full" type="text" name="postcode"
                value="{{ isset($user->studentProfile->postcode) ? $user->studentProfile->postcode : '' }}" />
                @error('postcode')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="city" :value="__('City')" />
              <x-forms.input-text id="city" class="block mt-1 w-full" type="text" name="city"
                value="{{ isset($user->studentProfile->city) ? $user->studentProfile->city : '' }}" />
                @error('city')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="state" :value="__('State')" />
              <x-forms.input-text id="state" class="block mt-1 w-full" type="text" name="state"
                value="{{ isset($user->studentProfile->state) ? $user->studentProfile->state : '' }}" />
                @error('state')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="country" :value="__('Country')" />
              <x-forms.input-text id="country" class="block mt-1 w-full" type="text" name="country"
                value="{{ isset($user->studentProfile->country) ? $user->studentProfile->country : '' }}" />
                @error('country')
                  <x-alerts.message type="error" :message="$message" />
                @enderror
            </div>
          </div>
        </div>
      </div>
    </x-content.card>
  </div>
  
  <!-- Parent Details -->
  @if(auth()->user()->role == 'student')
  <div class="pt-10">
    <x-content.card>
      <div class="grid gap-4 gap-y-2 px-4 grid-cols-1 lg:grid-cols-3">
        <div class="text-gray-600">
          <p class="font-medium text-lg">Parent Details</p>
          <p>Please fill out your parent details here.</p>
        </div>

        <div class="lg:col-span-2">
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
            <div class="md:col-span-3">
              <x-forms.input-label for="parent_first_name" :value="__('First Name')" />
              <x-forms.input-text id="parent_first_name" class="block mt-1 w-full" type="text" name="parent_first_name" 
              value="{{ isset($parent->first_name) ? $parent->first_name : '' }}"  />
              @error('parent_first_name')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
            </div>

            <div class="md:col-span-3">
              <x-forms.input-label for="parent_last_name" :value="__('Last Name')" />
              <x-forms.input-text id="parent_last_name" class="block mt-1 w-full" type="text" name="parent_last_name" 
                value="" />
                @error('parent_last_name')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="parent_mykad" :value="__('MyKad')" />
              <x-forms.input-text id="parent_mykad" class="block mt-1 w-full" type="parent_mykad" name="parent_mykad" 
                value="" />
              @error('parent_mykad')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="parent_birthdate" :value="__('Birthdate')" />
              <x-forms.input-text id="parent_birthdate" class="block mt-1 w-full" type="date" name="parent_birthdate" 
                value="" />
              @error('parent_birthdate')
                <x-alerts.message type="error" :message="$message"/>
              @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label class="mb-1" for="gender" :value="__('Gender')" />
              <ul class="grid gap-2 grid-cols-2 mb-2">
                <li>
                    <x-forms.radio-input id="parent_gender_male" class="hidden peer" type="radio" name="parent_gender" 
                      :selectedGender="isset($user->parent_profile->gender) ? $user->parent_profile->gender : '' " 
                      value="male" autofocus />
                    <x-forms.radio-label class="text-center" for="parent_gender_male" :value="__('Male')" />
                </li>
                <li>
                    <x-forms.radio-input id="parent_gender_female" class="hidden peer" type="radio" name="parent_gender"
                      :selectedGender="isset($user->parent_profile->gender) ? $user->parent_profile->gender : '' " 
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
                value="" />
                @error('parent_email')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>
            
            <div class="md:col-span-2">
              <x-forms.input-label for="parent_phone_no" :value="__('Phone No.')" />
              <x-forms.input-text id="parent_phone_no" class="block mt-1 w-full" type="text" name="parent_phone_no" 
                value="" />
                @error('parent_phone_no')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-1">
              <x-forms.input-label for="relation" :value="__('Relation')" />
              <x-forms.input-text id="relation" class="block mt-1 w-full" type="text" name="parent_relation" 
                value="" />
                @error('parent_relation')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>
            
            <div class="md:col-span-5">
              <x-forms.input-label for="parent_street_1" :value="__('Address / Street 1')" />
              <x-forms.input-text id="parent_street_1" class="block mt-1 w-full" type="text" name="parent_street_1" 
                value="" />
                @error('parent_street_1')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>
            
            <div class="md:col-start-1 md:col-span-5">
              <x-forms.input-label for="parent_street_2" :value="__('Street 2')" />
              <x-forms.input-text id="parent_street_2" class="block mt-1 w-full" type="text" name="parent_street_2" 
                value="" />
                @error('parent_street_2')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-1">
              <x-forms.input-label for="parent_postcode" :value="__('Postcode')" />
              <x-forms.input-text id="parent_postcode" class="block mt-1 w-full" type="text" name="parent_postcode" 
                value="" />
                @error('parent_postcode')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="parent_city" :value="__('City')" />
              <x-forms.input-text id="parent_city" class="block mt-1 w-full" type="text" name="parent_city" 
                value="" />
                @error('parent_city')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="parent_state" :value="__('State')" />
              <x-forms.input-text id="parent_state" class="block mt-1 w-full" type="text" name="parent_state" 
                value="" />
                @error('parent_state')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>

            <div class="md:col-span-2">
              <x-forms.input-label for="parent_country" :value="__('Country')" />
              <x-forms.input-text id="parent_country" class="block mt-1 w-full" type="text" name="parent_country" 
                value="" />
                @error('parent_country')
                  <x-alerts.message type="error" :message="$message"/>
                @enderror
            </div>
          
          </div>
        </div>
      </div>
    </x-content.card>
  </div>
  @endif
  <!-- Account Details -->
  <div class="py-10">
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

      <div class="text-right pt-4 pr-2">
        <x-forms.button-primary class="uppercase">
          {{ __('Update') }}
        </x-forms.button-primary>
      </div>
    </x-content.card>
  </div>
  </form>
</x-app-layout>