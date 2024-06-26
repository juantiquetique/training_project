@extends('layouts.main')

@section('titulo', 'Editar producto')

@section('content')
    <form action="{{ route('products.update' , $products->id) }}" method="post" class="needs-validation text-black" novalidate>
        @method('PUT')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $products->nombre }}">
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" value="{{ $products->precio }}">
            <label for="precio">Precio</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="Cantidad" name="Cantidad" placeholder="Cantidad" value="{{ $products->Cantidad }}" disabled>
            <label for="Cantidad">Cantidad</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="categoria_id" name="categoria_id" required>
                <option selected >Selecione...</option>
                    @foreach($categorias as $item)
                        <option value="{{ $item->id }}" @if($item->id == $products->categoria_id) selected @endif> {{ $item->nombre }}</option>
                    @endforeach
            </select>
            <label for="categoria_id">Categoria</label>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-secondary">Guardar</button>
    </form>
@endsection

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
             event.preventDefault()
             event.stopPropagation()
         }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    </script>

@endsection