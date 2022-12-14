<x-content.card>
  <div class="grid gap-4 gap-y-2 px-4 grid-cols-1 lg:grid-cols-3">
    <div class="text-gray-600">
      <p class="font-bold text-lg">Account Details</p>
      <p>You may change your user account details here.</p>
      <input type="hidden" name="user_id" value="{{$user->id}}">
    </div>

    <div class="lg:col-span-2">
      <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
        <div class="md:col-span-3">
          <x-forms.input-label for="email" :value="__('Email')" />
          <x-forms.input-text id="email" class="block mt-1 w-full" type="text" name="email" value="{{ $user->email }}" />
          @error('email')
            <x-alerts.message type="error" :message="$message"/>
          @enderror
        </div>

        <div class="md:col-span-3">
          <x-forms.input-label for="phone_no" :value="__('Phone No.')" />
          <x-forms.input-text id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" value="{{ $user->phone_no }}" />
            @error('phone_no')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
        </div>

        @if (auth()->user()->role == 'admin')
          <div class="md:col-span-3">
            <x-forms.input-label for="role" :value="__('Role')" />
            <x-forms.select-input id="role" class="block mt-1 w-full" type="text" name="role"
              :options="$roles" :title="__('Role')" :enum="true"
              :value="$user->role ?? old('role')"
              required />

            @error('role')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
          </div>

          <div class="md:col-span-3">
            <x-forms.input-label class="mb-1" for="status" :value="__('Account status')" />
            <ul class="grid gap-2 grid-cols-2 mb-2">
                <li>
                    <x-forms.radio-input id="active-status" class="hidden peer" type="radio" name="is_active"
                      :selected="$user->is_active ?? old('is_active') "
                      value="1" />
                    <x-forms.radio-label class="text-center" for="active-status" :value="__('Active')" />
                </li>
                <li>
                    <x-forms.radio-input id="disable-status" class="hidden peer" type="radio" name="is_active"
                      :selected="$user->is_active ?? old('is_active') "
                      value="0" />
                    <x-forms.radio-label class="text-center peer-checked:text-red-700 peer-checked:border-red-600 peer-checked:red-blue-600"
                      for="disable-status" :value="__('Disable')" />
                </li>
            </ul>
            @error('is_active')
              <x-alerts.message type="error" :message="$message"/>
            @enderror
          </div>
        @endif

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
