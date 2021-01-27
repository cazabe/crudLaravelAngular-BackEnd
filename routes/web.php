<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuariosController;
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

Route::get('usuarios', [UsuariosController::class, 'getAllUsuarios']);
Route::get('usuarios/{id}', [UsuariosController::class, 'getUsuario']);
Route::post('usuarios', [UsuariosController::class, 'createUsuario']);
Route::put('usuarios/{id}', [UsuariosController::class, 'updateUsuario']);
Route::put('usuarios/{id}', [UsuariosController::class, 'deleteUsuario']);