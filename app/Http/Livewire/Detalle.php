<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\detalleVenta as detalleDB;
use App\Models\products as productsDB;

class Detalle extends Component
{
    public $product;
    public $products;
    public $ventas_id;
    public $products_id;
    public $cantidad;
    public $valor_unitario;
    public $subtotal;
    public $error;

    public function mount()
    {
        $this->products = productsDB::all();
    }

    public function render()
    {
        return view('livewire.detalle');
    }

    public function detalleVenta()
    {
        if($this->product != null && $this->product != '')
        {
            //Guardar el producto
            detalleDB::create([
                'ventas_id'=> $this->product,
                'products_id'=> $this->product,
                'cantidad'=> $this->product,
                'valor_unitario'=> $this->product,
                'subtotal'=> $this->product,
            ]);
            $this->error = "";
            $this->product = "";

            //Cargar todos los productos 
            $this->products =detalleDB::all();

        } else{
            $this->error ="Debe ingresar el producto";
        }
    }
    
    public function eliminar($id)
    {
        //Eliminar el producto
        $productEliminar = productsDB::find($id);
        $productEliminar->delete();
        //Cargar todos los ptoductos
        $this->products = productsDB::all();
    }

    public function updated($products, $valor_unitario)
    {
        
    }
}
