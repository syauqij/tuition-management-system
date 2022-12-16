@props(['value'])

<td {{ $attributes->merge([
  'class' => 'text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'
]) }}>
  {{ $value ?? $slot }}
</td>
