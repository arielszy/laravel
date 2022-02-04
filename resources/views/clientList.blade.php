
@extends('base')
@section('content')
<div class="container bg-light table-responsive">
    <table class="table table-striped table-bordered table-hover table-sm text-center">
        <thead>
            <th>id</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>email</th>
            <th>direccion</th>
            <th>dni</th>
            <th>telefono</th>
            <th>puntos</th>
            <th>saldo</th>
            <th>acciones</th>
        </thead>
        <tbody>
            @forelse ($users as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{ route('resumenDesdeList', $item) }}">{{$item->name}}</a></td>
            <td>{{$item->surname}}</td>
            <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
            <td>{{$item->address}}</td>
            <td>{{$item->DNI}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->points}}</td>
            <td>{{$item->saldo}}</td>
            <td>
             <a href="{{ route('user.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
             <a href="{{ url('/newReg/Ajuste') }}" class="btn btn-info btn-sm">Ajustar</a>
             <a href="{{ route('user.edit', $item) }}" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
        </tr>
            @empty
               <tr>
                   <td colspan="10">no se encontraron registros</td>
                </tr> 
            @endforelse
        </tbody>
    </table>
</div>
    @if ($users->count())
    {{$users->links()}}
    @endif
@endsection