<?php
    $Config=DB::select('select * from configs');
    $Config = array_column($Config,'value', 'key');
?>
@extends('base')

@section('content')
<div class=" text-center mt-5 text-light">   
<h1>{{@$op}}</h1>
</div>

            @if (isset($user) && ($op==='Compra') || ($op==='Ajuste'))
            <div class="row ">
                <div class="col-lg-7 mx-auto ">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                            <div class="container">
                <form id="contact-form" role="form" method="post" action="#" onsubmit="enable(this);">
                @csrf
                <input type="hidden" name="Tipo" value="{{@$op}}">
                <div class="controls">     
                    <label for="DNI">DNI *</label> 
                    <input id="DNI" type="number" name="DNI" class="form-control"  required="required" disabled="disabled" value="{{@$user['DNI']}}"> 
                    <label>{{@$user['name'] , @$user['surname']}}</label> 
                    </br>
                    <label for="Importe" id="Importelv" name="Importelv" >Importe *</label> 
                    <input autofocus id="Importe" type="number" step="0.01" name="Importe" class="form-control"  required="required" maxlength="12"  oninput="calculaPoints('{{$Config['points_redeem']}}');" >
                @if ($op==='Ajuste')</br> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" value="Sumar" required>
                        <label class="form-check-label" for="inlineRadio1">Sumar</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" value="Restar" required>
                        <label class="form-check-label" for="inlineRadio2">Restar</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" value="Modificar" required>
                        <label class="form-check-label" for="inlineRadio3">Modificar</label>
                      </div></br>
                    @endif  
                    <label for="Puntos" id="Puntoslv" name="Puntoslv">Puntos</label> 
                    <input id="Puntos" type="number" name="Puntos" class="form-control"  required="required" @if($op=='Compra'){{'disabled="disabled"'}}@endif value=''>  
                    <label for="Comentarios" id="Comentarioslv" name="Comentarioslv">Comentarios</label> 
                    <textarea id="Comentarios" type="text" name="Comentarios" class="form-control" rows="3" cols="15" maxlength="250"></textarea>
                    </br> 
                    <div class=" d-md-flex justify-content-between">
                    <input type="submit" name="btn" class="btn btn-success btn-send" value="GUARDAR"> 
                    </div>
       
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /.8 -->
</div> <!-- /.row-->
</div>
@endif

@if (isset($user)&& ($op==='Canje'))
<h2 class="text-light">Cliente {{$user['name']}}. Puntos disponibles: {{$user['points']}}</h2> 
<table class="table table-striped table-bordered table-hover table-sm text-center bg-light">
    <thead>
        <th>id</th>
        <th>Descripcion</th>
        <th>Valor</th>
        <th>acciones</th>
    </thead>
    <tbody>
        @forelse ($prize as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->Descripcion}}</td>
        <td>{{$item->Valor}}</td>
        <td>
            <form id="contact-form" role="form" method="post" action="#">
                @csrf
                <input type="hidden" name="Tipo" value="Canje">
                <input type="hidden" name="Descripcion" value="{{$item->Descripcion}}">
                <input type="hidden" name="Valor" value="{{$item->Valor}}">
                <input type="submit" name="btn" class="btn btn-success btn-sm btn-send" onclick="return confirm('Esta seguro que desea canjear?');" value="Canjear"> 
            </form>
        </td>
    </tr>
        @empty
           <tr>
               <td colspan="4">no hay premios disponibles</td>
            </tr> 
        @endforelse
    </tbody>
</table>
</div>
@if ($prize->count())
{{$prize->links()}}
@endif
@endif







@endsection

@section('custom-css-js')
<script src="{{asset('js/home.js')}}" type="text/javascript"></script>
@endsection