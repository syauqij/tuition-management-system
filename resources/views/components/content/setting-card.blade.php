<div class="p-2 sm:w-1/2 w-full">
  <div class="bg-gray-100 rounded flex p-4 h-full items-center">
    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
      {{ $icon }}
    </svg>
    <span class="title-font font-medium">
      {{ $slot }}
    </span>
  </div>
</div>