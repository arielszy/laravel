
@extends('base')

@section('content')
@if (Session::has('msj'))
<div class="alert alert-info">
    {{Session::get('msj')}}
</div>
    
@endif
  resumen del cliente {{$DNI}}  
@endsection

