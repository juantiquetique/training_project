<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleVenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'ventas_id',
        'products_id',
        'cantidad',
        'valor_unitario',
        'subtotal'
    ];
}

