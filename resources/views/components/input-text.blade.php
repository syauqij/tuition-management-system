<input {{ $attributes
  ->class([
    // rounded-md shadow-sm border border-gray-500 focus:border-indigo-300 
    // focus:ring focus:ring-indigo-200 focus:ring-opacity-50
    
    'rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 
    focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out'
    , 
    'border-red-500' => $errors->has($attributes->get('name'))])
  ->merge(['disabled' => false])
}} />
