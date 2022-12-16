@props(['value'])

<th {{ $attributes->merge(['scope' => 'col',
  'class' => 'text-sm font-title text-gray-900 px-6 py-4 text-left'
 ]) }}>
  {{ $value ?? $slot }}
</th>
