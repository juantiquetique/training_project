<div>
    @if($error !="")
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>¡Atencion!</strong> {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="my-3">
        <table class="table" >
            <thead>
                <tr class="text-white">
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Valor unitario</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- <form action="" method="post" class="needs-validation" novalidate> --}}
                <form wire:submit.prevent='detalleVenta'>
                    @csrf
                    <td class="col-3">  
                        <div class="form-floating mb-3">
                            <select class="form-select" id="products_id" name="products_id" wire:model="products_id" required>
                                <option selected >Seleccione...</option>
                                    @if($products != null)
                                        @foreach($products as $item)
                                            <option value="{{ $item->id }}" data-data="{{ $item }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <label for="products_id">Nombre</label>
                            </div>
                    </td>
                    <td class="col-3">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" id="cantidad" name="cantidad" wire:model="cantidad" placeholder="Cantidad">
                            <label for="cantidad">Cantidad</label>
                        </div>
                    </td>
                    <td class="col-3">  
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="valor_unitario" name="valor_unitario" wire:model="valor_unitario" placeholder="Valor">
                            <label for="valor_unitario">Precio</label>
                        </div>
                    </td>
                    <td class="col-3">  
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="subtotal" name="subtotal" wire:model="subtotal" placeholder="Subtotal" disabled>
                            <label for="subtotal">Subtotal</label>
                        </div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-secondary mt-2">Agregar</button>
                    </td>
                </form>
            </tbody>
        </table>
        @if(count($products) > 0)
            <table class="table text-white">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Valor unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="detalle_venta">
                    <td> {{ $products_id }}</td>
                    <td>{{ $cantidad }}</td>
                    <td>{{ $valor_unitario }}</td>
                    <td>{{ $subtotal}}</td>
                    <td></td>
                    <form action="{{ route('detalleVenta.store') }}" method="post" class="needs-validation" novalidate>
                        <div id="acciones_venta" class="form-group">
                            <a href="" class="btn btn-danger">Anular</a>
                            <button type="submit" class="btn btn-secondary"><i class="fas fa-save"></i> Generar Venta</button>
                        </div>
                    </form>
                </tbody>
            </table>
        @endif
    </div>

@section('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        //Lanzar alerta de Sweetalert
        Swal.fire({
            title: '¿Esta seguro de eliminar?',
            text: "Esta acción no se podrá deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
    $("#products_id").change(function(){
        var dataSelected = $(this).find(':selected').data('data');
        $("#valor_unitario").val("");
        if(dataSelected){
            $("#valor_unitario").val(dataSelected.precio);
        }
    });

    $("#cantidad").change(function(){
        $("#subtotal").val($("#valor_unitario").val() * this.value);
    });
</script>
@endsection
</div>
