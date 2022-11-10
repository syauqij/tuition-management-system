@props(['errors'])

@if ($errors->any())
  <div class="bg-red-100 rounded-lg py-5 px-6 mb-4" role="alert">
    <div class="font-medium text-red-600">
      {{ __('Whoops! Something went wrong. Please try again.') }}
    </div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif