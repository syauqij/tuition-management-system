@props(['value'])

<a {{ $attributes->merge(['class' => 'text-blue-600 hover:text-blue-900']) }}>
  {{ $value ?? $slot }}
</a>