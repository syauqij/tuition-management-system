@props(['options', 'title' => '', 'value' => '', 'enum' => 'falase'])

<select {{ $attributes
  ->class([
    'rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200
      text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out',
    'border-red-500' => $errors->has($attributes->get('name'))])
  ->merge(['disabled' => false])
}}>

  <option value=""> Choose the {{$title}} </option>

  @if($enum)
    @foreach($options as $itemName)
      <option value="{{ $itemName }}" {{ ( $itemName == $value) ? 'selected' : '' }}> {{ $itemName }} </option>
    @endforeach
  @else
    @foreach($options as $itemName => $itemId)
      <option value="{{ $itemId }}" {{ ( $itemId == $value) ? 'selected' : '' }}> {{ $itemName }} </option>
    @endforeach
  @endif
</select>
