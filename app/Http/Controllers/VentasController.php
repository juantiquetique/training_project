<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
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
        return view('ventas.index', compact('products'));
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
        Ventas::create($request->all());
        $producto = Products::findOrFail($request->products_id);
        $cantidadActual = $producto->Cantidad;
        $cantidadNueva = $cantidadActual - $request->cantidad;
        $producto->Cantidad = $cantidadNueva;
        $producto->save();

        return redirect()->route('ventas.index')->with('exito', '¡La venta se a realizado satisfactoriamente!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show(ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(ventas $ventas)
    {
        //
    }
}
