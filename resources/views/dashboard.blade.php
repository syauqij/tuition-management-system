<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <x-content.card>
          You're logged in!
      </x-content.card>
    </div>
</x-app-layout>
