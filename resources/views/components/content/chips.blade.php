@props(['value'])

<span {{ $attributes->merge(['class' => 'px-4 py-2 rounded-full border border-gray-300 text-white
    bg-blue-500 font-semibold text-sm flex align-center w-max']) }}>
  {{ $value ?? $slot }}
</span>
