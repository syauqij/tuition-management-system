<textarea {{ $attributes
  ->class([ 
    'rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 
      h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out', 
    'border-red-500' => $errors->has($attributes->get('name'))])
  ->merge(['disabled' => false])
}}>{{ $value ?? $slot }}
</textarea>