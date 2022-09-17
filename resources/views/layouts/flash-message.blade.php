@if ($message = Session::get('success'))
  <x-success-alert :message="$message"/>
@endif
@if ($message = Session::get('error'))

@endif
@if ($message = Session::get('warning'))

@endif
@if ($message = Session::get('info'))

@endif
@if ($errors->any())
  <x-errors-alert />
@endif