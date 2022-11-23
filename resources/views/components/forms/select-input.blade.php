@props(['options', 'title' => '', 'value' => ''])

<select {{ $attributes
  ->class([ 
    'rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 
      text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out', 
    'border-red-500' => $errors->has($attributes->get('name'))])
  ->merge(['disabled' => false])
}} > 

  <option disabled selected value> Choose the {{$title}} </option>

  @foreach($options as $item_name => $item_id)
    <option value="{{ $item_id }}" {{ ( $item_id == $value) ? 'selected' : '' }}> {{ $item_name }} </option>
  @endforeach

</select>