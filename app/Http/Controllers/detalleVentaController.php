<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\ventas;
use App\Models\detalleVenta;
use Illuminate\Http\Request;

class detalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consultar productos
        $products = Products::orderBy('nombre', 'asc')
                             ->get();
        return view('detalleVenta.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        detalleVenta::create($request->all());
        $producto = Products::findOrFail($request->products_id);
        $cantidadActual = $producto->Cantidad;
        $cantidadNueva = $cantidadActual - $request->cantidad;
        $producto->Cantidad = $cantidadNueva;
        $producto->save();

        return redirect()->route('detalleVenta.index')->with('exito', '¡La venta se a realizado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function show(detalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function edit(detalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalleVenta  $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalleVenta $detalleVenta)
    {
        // $detalleVenta = Products::findOrFail($id);
        return redirect()->route('detalleVenta.index');
    }
}
