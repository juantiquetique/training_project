@extends('layouts.main')

@section('titulo', 'Venta')

@section('content')
<table class="table text-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Fecha Compra</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td >
                    
            </td>
            <td >
                    
            </td>
            <td >
                    
            </td>
        </tr>
    </tbody>
</table>

    
@endsection
    
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
</script>

@endsection