@extends('layouts.main')

@section('titulo', 'Detalle de Categoría')

@section('content')
<table class="table text-white">
    <th></th>
    <tbody>
        <td>
            @foreach($products as $item)
                <li>{{$item->nombre}}</li>
            @endforeach
        </td>
    </tbody>
</table>
<a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
@endsection