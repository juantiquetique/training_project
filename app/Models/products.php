<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'nombre',
        'precioVenta', //cambie la palabra precio a precioVenta
        'Cantidad',
        'categoria_id',
        'valorUnitario' //esto es nuevo
    ];
}
