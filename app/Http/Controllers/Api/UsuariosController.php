<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    //traer usuarios
    public function getAllUsuarios() {
        $usuarios = Usuarios::get()->toJson(JSON_PRETTY_PRINT);
        return response($usuarios, 200);
      }

      //buscar usuario por id
      public function getUsuario($id) {
        if (Usuarios::where('persona_id', $id)->exists()) {
          $usuario = Usuarios::where('persona_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($usuario, 200);
        } else {
          return response()->json([
            "message" => "ERROR"
          ], 404);
        }
      }
      //crear usuario
      public function createUsuario(Request $request) {
        try {
            $usuario = new Usuarios;
            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->cedula = $request->cedula;
            $usuario->estado = $request->estado;
            $usuario->save();
      
            return response()->json([
              "message" => "OK"
            ], 200);

        }catch (Exception $e) {
            return response()->json([
                "message" => "ERROR DE SERVIDOR"
              ], 500);
        }
       
      }


      //Actualizar usuario
      public function updateUsuario(Request $request, $id) {
        if (Usuarios::where('persona_id', $id)->exists()) {

          $usuario = Usuarios::find($id);
  
          $usuario->nombres = $request->nombres;
          $usuario->apellidos = $request->apellidos;
          $usuario->cedula = $request->cedula;
          $usuario->estado = $request->estado;
          $usuario->save();
  
          return response()->json([
            "message" => "Usuario actualizado"
          ], 200);
        } else {
          return response()->json([
            "message" => "Usuario no encontrado"
          ], 404);
        }
      }
     
      //Eliminar usuario
      public function deleteUsuario($id) {
        if(Usuarios::where('persona_id', $id)->exists()) {
          // $usuario = Usuarios::where('persona_id', '=' ,$id)->first();
          $usuario = Usuarios::find($id);
          $usuario->delete();
  
          return response()->json([
            "message" => "Usuario eliminado"
          ], 200);
        } else {
          return response()->json([
            "message" => "Usuario no encontrado"
          ], 404);
        }
      }
}
