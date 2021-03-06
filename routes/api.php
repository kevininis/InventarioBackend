<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\EstadoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Login', [AuthController::class, 'Login']);
Route::post('/NuevoUsuario', [AuthController::class, 'NuevoUsuario']);

// ROLES
Route::get('/ListarRoles', [RolesController::class, 'ListarRoles']);
Route::post('/NuevoRol', [RolesController::class, 'NuevoRol']);

//CATEGORIAS
Route::post('/NuevaCategoria', [CategoriasController::class, 'NuevaCategoria']);
//UBICACION
Route::post('/NuevaUbicacion', [UbicacionController::class, 'NuevaUbicacion']);
//TIPOPAGO
Route::post('/NuevoTipoPago', [TipoPagoController::class, 'NuevoTipoPago']);
//ESTADO
Route::post('/NuevoEstado', [EstadoController::class, 'NuevoEstado']);


Route::middleware('auth:api')->group( function () {
    Route::post('/Logout', [AuthController::class, 'Logout']);
    
    
    // PROVEEDORES
    Route::post('/NuevoProveedor', [ProveedoresController::class, 'NuevoProveedor']);
    Route::post('/ListarProveedores', [ProveedoresController::class, 'ListarProveedores']);
    Route::post('/ModificarProveedor', [ProveedoresController::class, 'ModificarProveedor']);
    Route::post('/EliminarProveedor', [ProveedoresController::class, 'EliminarProveedor']);
    
    // CLIENTE
    Route::post('/NuevoCliente', [ClientesController::class, 'NuevoCliente']);
    Route::post('/ListarClientes', [ClientesController::class, 'ListarClientes']);
    Route::post('/ModificarCliente', [ClientesController::class, 'ModificarCliente']);
    Route::post('/EliminarCliente', [ClientesController::class, 'EliminarCliente']);
    
    // CATEGORIAS
    Route::get('/ListarCategorias', [CategoriasController::class, 'ListarCategorias']);
    
    // UBICACIONES
    Route::get('/ListarUbicaciones', [UbicacionController::class, 'ListarUbicaciones']);
    
    // TIPOPAGO
    Route::get('/ListarTipoPago', [TipoPagoController::class, 'ListarTipoPago']);
    
    // ESTADO
    Route::get('/ListarEstados', [EstadoController::class, 'ListarEstados']);
    
    // PRODUCTOS
    Route::post('/NuevoPoducto', [ProductosController::class, 'NuevoPoducto']);
    Route::post('/ListarProductos', [ProductosController::class, 'ListarProductos']);
    Route::post('/ModificarProducto', [ProductosController::class, 'ModificarProducto']);
    Route::post('/EliminarProducto', [ProductosController::class, 'EliminarProducto']);

});

