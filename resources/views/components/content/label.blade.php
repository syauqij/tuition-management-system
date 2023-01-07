@props(['value'])

<h2 {{ $attributes->merge(['class' => 'tracking-widest title-font font-semibold text-indigo-500 mb-1']) }}>
  {{ $value ?? $slot }}
</h2>
