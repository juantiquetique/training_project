<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AbastecimientoController;
use App\Http\Controllers\detalleVentaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/detalleVenta', function () {
    return view('detalleVenta.index');
})->name('detalleVenta.index');

require __DIR__.'/auth.php';
Route::resource('products',ProductsController::class)->middleware('auth');
Route::resource('usuarios',UsuariosController::class)->middleware('auth');
Route::resource('ventas',VentasController::class)->middleware('auth');
Route::resource('categorias',CategoriasController::class)->middleware('auth');
Route::resource('abastecimiento',AbastecimientoController::class)->middleware('auth');
Route::resource('detalleVenta',detalleVentaController::class)->middleware('auth');



