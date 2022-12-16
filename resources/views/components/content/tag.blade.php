@props(['colours' => 'text-gray-500 bg-gray-200 active:bg-gray-300'])

<span class="px-4 py-2 rounded-full {{$colours}}
    font-semibold text-sm flex align-center w-max cursor-pointer
    transition duration-300 ease">
  {{$slot}}
</span>
