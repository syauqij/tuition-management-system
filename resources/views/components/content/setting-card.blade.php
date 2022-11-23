@props(['width' => 'sm:w-1/2', 'align' => 'p-4 justify-left'])

<div class="p-2 w-full {{$width}}">
  <div class="bg-gray-100 rounded flex h-full items-center {{$align}}">
    @isset ($icon)
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" 
        class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
        {{ $icon }}
      </svg>
    @endisset
    <span class="title-font font-medium tracking-widest truncate block">
      {{ $slot }}
    </span>
  </div>
</div>