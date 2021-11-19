<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Repositories\Postrepository;
use App\Models\Producto;
 
class ProductoController extends Controller
{

    private $productoRepository;

    public function __construct(Postrepository $repository){
        $this->productoRepository = $repository;
    }

    public function listar()
    {
        try {
            $productos = $this->productoRepository->listar();

            return response()->json(
                [
                    "productos" => $productos,
                ], 200
            );
        } catch (\Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    public function searchById(string $id)
    {
        try {
            $producto = $this->productoRepository->searchById($id);

            return response()->json(
                [
                    "producto" => $producto,
                ], 200
            );
        } catch (\Exception $th) {
            return response()->json($th->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {

            $producto = $this->productoRepository->create($request);

            return response()->json(
                [
                    "producto" => $producto,
                    "msg" => "Producto creado!!",
                ], 200
            );

        } catch (\Exception $th) {
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

        } catch (\Exception $th) {
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
        } catch (\Exception $th) {
            return response()->json($th->getMessage());
        }
    }

}