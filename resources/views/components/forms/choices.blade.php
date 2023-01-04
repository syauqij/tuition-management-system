@props(['options', 'title' => '', 'selected' => ''])

<select {{ $attributes
  ->class([
    '',
    'border-red-500' => $errors->has($attributes->get('name'))])
  ->merge(['disabled' => false])
}}>

  <option value=""> Choose the {{$title}} </option>

  @foreach($options as $itemName => $itemId)
    @if ($selected)
      <option value="{{ $itemId }}"
        @if(in_array($itemId, $selected))
          selected
        @endif>
          {{ $itemName }}
      </option>
    @else
      <option value="{{ $itemId }}"> {{ $itemName }} </option>
    @endif
  @endforeach

</select>
