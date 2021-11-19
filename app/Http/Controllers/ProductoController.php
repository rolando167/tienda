<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function listar()
    {
        try {
            $productos = Producto::where('estado', 1)->paginate(5);

            return response()->json(
                [
                    "productos" => $productos,
                ], 200
            );
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function searchById(string $id)
    {
        try {
            $producto = Producto::findOrFail($id);

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
            $producto = new Producto([
                "nombre": $request->nombre,
                "descripcion": $request->descripcion,
                "cantidad": $request->cantidad,
                "estado": 0,
            ]);

            return response()->json(
                [
                    "producto" => $producto,
                    "msg" => "Producto creado!!",
                ], 200
            );

        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function update(string $id, Request $request)
    {
        try {
            $producto = Producto::findOrFail($id);
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


    public function delete(string $id)
    {
        try {
            $producto = Producto::findOrFail($id);
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