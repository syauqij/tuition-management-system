@props(['baseClasses' => 'max-w-7xl mx-auto sm:px-6 lg:px-8', 'contentClasses' => 'border-b bg-white'])

<div class=" {{$baseClasses}} ">
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 border-gray-200 border-opacity-60 rounded-lg {{ $contentClasses }}">
       {{ $slot }}
    </div>
  </div>
</div>