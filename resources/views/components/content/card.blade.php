@props(['baseClasses' => 'pt-4', 'contentClasses' => 'border-b bg-white'])

<div class="{{$baseClasses}} ">
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 border-gray-200 border-opacity-60 rounded-lg {{ $contentClasses }}">
       {{ $slot }}
    </div>
  </div>
</div>
