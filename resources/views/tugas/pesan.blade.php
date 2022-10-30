@if($message = Session::get('succes'))
<strong>{{$$message}}</strong>
@endif
@if($message = Session::get('warning'))
<strong>{{$$message}}</strong>
@endif
@if($message = Session::get('info'))
<strong>{{$$message}}</strong>
@endif
@if($message = Session::get('error'))
<strong>{{ $message}}</strong>
@endif
@if($errors->any())
<strong> please dont ERROR</strong>
@endif