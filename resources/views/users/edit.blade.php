<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit User - ') . $user->fullName}}
      </h2>
  </x-slot>

  <form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

  <!-- Account Details -->
  @include('users.account')

  <!-- Personal Details -->
  @if($role == 'student')
    @include('users.student-profile')
    @include('users.parent-profile')
  @else
    @include('users.staff-profile')
  @endif

  <div class="text-right py-5">
    <x-forms.button-primary class="uppercase">
      {{ __('Update') }}
    </x-forms.button-primary>
  </div>
  </form>
</x-app-layout>
