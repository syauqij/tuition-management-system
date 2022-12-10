

@php
  if ($message = Session::get('success')) {
    $bgColour = 'bg-green-100';
    $txtColour = 'text-green-700';
  }

  elseif ($message = Session::get('error')) {
    $bgColour = 'bg-red-100';
    $txtColour = 'text-red-700';
  }

  elseif($errors->any()) {
    $message = 'Whoops! Something went wrong. Please try again.';
    $bgColour = 'bg-red-100';
    $txtColour = 'text-red-700';
  }

@endphp

@if ($message)
  <div class="py-5 px-6 alert {{ $bgColour }} rounded-lg text-base {{ $txtColour }}
    shadow-sm sm:rounded-lg items-center alert-dismissible fade show" role="alert">

    <div class="inline-flex w-full">
      {{ $message }}

    <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-gray-600 border-none rounded-none opacity-50
      focus:shadow-none focus:outline-none focus:opacity-100 hover:text-gray-900 hover:opacity-75 hover:no-underline"
      data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>

    @if ($errors->any())
      <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

  </div>
@endif
