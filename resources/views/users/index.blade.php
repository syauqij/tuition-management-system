<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Manage users') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mb-4">
      <table class="min-w-full">
        <thead class="border-b">
          <tr>
            <x-table.heading :value="__('#')" />
            <x-table.heading :value="__('Full Name')" />
            <x-table.heading :value="__('Email')" />
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
              <x-table.cell :value="$user->role" class="capitalize"/>
              <x-table.cell :value="$user->is_active ? 'Active' : 'Disabled'" />
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
