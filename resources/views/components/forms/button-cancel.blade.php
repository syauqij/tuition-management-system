@props(['value'])

<a href={{ route($value) }} {{$attributes}}>
  <button type='button' class='text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg'>
    {{ $slot }}
  </button>
</a>