{{-- 
*extend importa la vista base  extends(nombre del archivo)  
*section reemplaza el yield de la base con lo que se escriba dentro  section(nombre del yield a reemplazar)
*url llama a un archivo externo. debe estar en la carpeta public
--}}
@extends('base') 

@section('content')
<header class='masthead'>
    <div class='container position-relative'>
        <div class='row justify-content-center'>
            <div class='col-xl-6'>
        @if (isset($DNI)) 
         <div class="alert alert-danger">
            <span>El DNI {{$DNI}} no existe. <a class="alert-danger" href="{{ route('user.create', ['DNI'=>$DNI]) }}">Clic aqui para agregarlo</a></span>
        </div>
        @endif
                <div class='text-center text-white'>
                    <h1 class="text-center mb-3">ingrese el DNI del cliente para comenzar</h1>
                    <form class="form-inline" method='post' target='_self' action="#">
                        @csrf
                        <div class="form-group mx-sm-1 mb-2">
                            <input required="required" id="dni" name="DNI" type="number" value="{{old('DNI') ?? @$DNI}}" class="form-control" placeholder="DNI">
                        </div>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</header>
@endsection

@section('custom-css-js')
<link href=" {{ url('css/styles.css') }}" rel="stylesheet" type="text/css"/>
@endsection