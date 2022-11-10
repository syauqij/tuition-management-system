@if ($message)
  <div {{ $attributes }}>
    <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700" role="alert">
      {{ $message }}
    </div>
  </div>
@endif