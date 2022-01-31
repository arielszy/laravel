
@extends('base')

@section('content')
@if (isset($user))
    

  <h1>Resumen del cliente {{$user['name']}}. </h1>
  <h2>Puntos disponibles: {{$user['points']}}; Saldo actual: ${{$user['saldo']}}</h2> 
  <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-sm">Editar cliente</a>
  <a href="{{ route('user.edit', $user) }}" class="btn btn-info btn-sm">Ajustar saldo</a>
  <a href="{{ route('user.edit', $user) }}" class="btn btn-success btn-sm">nueva compra</a>
  <a href="{{ route('user.edit', $user) }}" class="btn btn-success btn-sm">nuevo canje</a>
  <div class="card">
    <div class="bootstrap-data-table-panel">
      <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover example">
        <thead>
            <tr>
            <th>Fecha</th>
            <th>Nro operacion</th>
            <th>Tipo operacion</th>
            <th>Importe</th>
            <th>Puntos</th>
            <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
          @if ($opList!=null)
              
          @forelse ($opList as $item)
            <tr>
              <td>{{$item['created_at']}}</td>
              <td>#{{$item['id']}}</td>
              <td>{{$item['Tipo']}}</td>
              <td>{{$item['Importe']}}</td>
              <td>{{$item['Puntos']}}</td>
              <td>{{$item['Comentarios']}}</td>
            </tr>              
          @empty
              
          @endforelse 
          @endif

        </tbody>
    </table>
  </div>   
</div>   

@endif
@endsection

@section('custom-css-js')
<script src={{ url('js/jquery.min.js') }}></script>
<script src="{{ url('js/scripts.js') }}"></script>
<link href="{{ url('css/buttons.dataTables.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/buttons.dataTables.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/style.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ url('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" >
<script src="{{ url('js/datatables.min.js') }}"></script>
<script src="{{ url('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('js/jszip.min.js') }}"></script>
<script src="{{ url('js/pdfmake.min.js') }}"></script>
<script src="{{ url('js/vfs_fonts.js') }}"></script>
<script src="{{ url('js/buttons.html5.min.js') }}"></script>
<script src="{{ url('js/buttons.print.min.js') }}"></script>
<script src="{{ url('js/datatables-init.js') }}"></script>
@endsection