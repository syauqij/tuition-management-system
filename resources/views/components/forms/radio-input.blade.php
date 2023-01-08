@props(['selected' => ''])

<input {{ $attributes
  ->class(['w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500'
    => $errors->has($attributes->get('name'))
  ])->merge(['disabled' => false])
}} @checked($attributes->get('value') == $selected) />
