<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Manage Users') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mb-4">
      <form method="get" action="{{ route('users.search') }}">
        <x-forms.search-input  name="keywords" value="{{ $keywords ?? null }}"
          position="justify-left" class="xl:w-7/12" marginBtm='mb-2'
          placeholder="Enter a name, email or mykad"/>
      </form>
      <table class="min-w-full">
        <thead class="border-b">
          <tr>
            <x-table.heading :value="__('#')" />
            <x-table.heading :value="__('Full Name')" />
            <x-table.heading :value="__('Email')" />
            <x-table.heading :value="__('Mykad')" />
            <x-table.heading :value="__('Role')" />
            <x-table.heading :value="__('Status')" />
            <x-table.heading :value="__('Action')" />
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr class="border-b">
              <x-table.cell :value="$loop->index+1" />
              <x-table.cell :value="$user->fullName" class="truncate"/>
              <x-table.cell :value="$user->email"/>

              @if($user->role == "student")
                <x-table.cell
                  :value="isset($user->studentProfile->mykad) ? $user->studentProfile->mykad : '' "
                  class="capitalize"/>
              @else
                <x-table.cell
                  :value="isset($user->parentProfile->mykad) ? $user->parentProfile->mykad : '' "
                  class="capitalize"/>
              @endif

              <x-table.cell :value="$user->role" class="capitalize"/>
              <x-table.cell :value="$user->is_active ? 'Active' : 'Disable'" />
              <td>
                <a href="{{ route('users.edit', $user->id )}}">
                  <x-forms.button-primary class="text-xs">
                    {{ __('Edit') }}
                  </x-forms.button-primary>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="py-4">
        {{ $users->links() }}
      </div>
    </div>
  </x-content.card>
</x-app-layout>
