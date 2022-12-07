@extends('layouts.main')

@section('titulo', 'Detalle del producto')

@section('content')
    <div class="row my-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="table table-bordered mt-3 text-white">
                <tbody>
                    <tr>
                        <td class="fw-bold">Nombre</td>
                        <td>{{ $products->nombre}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold" id="precio">Precio Venta</td>
                        <td>{{ $products->precio}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Cantidad</td>
                        <td>{{ $products->Cantidad}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Categoría</td>
                        <td>{{ $products->categorias}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold" id="valor">Precio Abastecimiento</td>
                        <td>{{ $abastecimiento->valor}}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('abastecimiento.index') }}" class="btn btn-warning" id="abastecimiento">Abastecer</a>
        </div>

    </div>
@endsection