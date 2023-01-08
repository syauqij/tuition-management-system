<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('My Profile') }}
      </h2>
  </x-slot>

  <form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

  <!-- Personal Details -->
  @if($role == 'student')
    @include('users.student-profile')
    @include('users.parent-profile')
  @else
    @include('users.staff-profile')
  @endif

  <!-- Account Details -->
  @include('users.account')

  <div class="text-right py-5">
    <x-forms.button-primary class="uppercase">
      {{ __('Update') }}
    </x-forms.button-primary>
  </div>
  </form>
</x-app-layout>
