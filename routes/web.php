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

Route::get('api/personas', [UsuariosController::class, 'getAllUsuarios']);
Route::get('api/personas/{id}', [UsuariosController::class, 'getUsuario']);
Route::post('api/personas/create', [UsuariosController::class, 'createUsuario']);
Route::post('api/personas/update/{id}', [UsuariosController::class, 'updateUsuario']);
Route::put('api/personas/delete/{id}', [UsuariosController::class, 'deleteUsuario']);