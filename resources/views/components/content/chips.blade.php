@props(['value'])

<span {{ $attributes->merge(['class' => '  <span class="text-xs inline-block py-1 px-2.5 leading-none text-center
  whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded-full']) }}>
  {{ $value ?? $slot }}
</span>
