<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Producto;

class UsuarioController extends Controller
{

    public function listar()
    {
        try {
            $productos = Productos::where('estado', 1)->get();

            
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function searchById(Request $request)
    {
        try {
            $producto = Productos::findOrFail($request->id);

            return response()->json(
                [
                    "producto" => $producto,
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $producto = new Productos([
                "nombre": $request->nombre,
                "descripcion": $request->descripcion,
                "cantidad": $request->cantidad,
                "estado": 0,
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function update()
    {
        try {
            $producto = Productos::findOrFail($request->id);
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->cantidad = $request->cantidad;
            $producto->update();

            return response()->json(
                [
                    "producto" => $producto,
                    "msg" => "Producto Editado!!",
                ], 200
            );

        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }


    public function delete()
    {
        try {
            $producto = Productos::findOrFail($request->id);
            $producto->delete();

            return response()->json(
                [
                    "msg" => "Producto Eliminado!!",
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

}