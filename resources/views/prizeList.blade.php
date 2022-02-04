
@extends('base')
@section('content')

<div class="container bg-light table-responsive">
    <a class="btn btn info">Nuevo</a>
    <table class="table table-striped table-bordered table-hover table-sm text-center">
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
            <a href="{{ route('user.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
            <a href="{{ route('user.edit', $item) }}" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
        </tr>
            @empty
               <tr>
                   <td colspan="4">no se encontraron registros</td>
                </tr> 
            @endforelse
        </tbody>
    </table>
</div>
    @if ($prize->count())
    {{$prize->links()}}
    @endif
@endsection