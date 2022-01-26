
@extends('base')
@section('content')
    <table class="table text-center">
        <thead>
            <th>nombre</th>
            <th>apellido</th>
            <th>dni</th>
            <th>acciones</th>
        </thead>
        <tbody>
            @forelse ($users as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->surname}}</td>
            <td>{{$item->DNI}}</td>
            <td>
             <a href="{{ route('user.edit', $item) }}" class="btn btn-warning">Editar</a>
             <a href="{{ route('user.edit', $item) }}" class="btn btn-info">Ajustar saldo</a>
             <a href="{{ route('user.edit', $item) }}" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
            @empty
               <tr>
                   <td colspan="4">no se encontraron registros</td>
                </tr> 
            @endforelse
        </tbody>
    </table>
    @if ($users->count())
    {{$users->links()}}
    @endif
@endsection