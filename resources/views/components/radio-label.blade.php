@props(['value'])

<label {{ $attributes->merge(['class' => 'block justify-between items-center p-2 w-full 
        text-sm font-semibold bg-white rounded-lg border border-gray-200 hover:text-gray-600 hover:bg-gray-100
        cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600
      ']) 
    }}>
    {{ $value ?? $slot }}
</label>
