
@extends('base')

@section('content')


{{
$user=session('user');

  
}}
  <h1>Resumen del cliente {{@$user['DNI']}} </h1>  

@endsection

