@if ($message = Session::get('success'))
  <x-alerts.success :message="$message"/>
@endif
@if ($message = Session::get('error'))

@endif
@if ($message = Session::get('warning'))

@endif
@if ($message = Session::get('info'))

@endif
@if ($errors->any())
  <x-alerts.errors />
@endif