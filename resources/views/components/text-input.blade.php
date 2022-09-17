<input {{ $attributes
  ->class(['rounded-md shadow-sm border border-gray-500 focus:border-indigo-300 
    focus:ring focus:ring-indigo-200 focus:ring-opacity-50', 
    'border-red-500' => $errors->has($attributes->get('name'))])
  ->merge(['disabled' => false])
}} />
