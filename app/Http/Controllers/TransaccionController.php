<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Transaccion;

class TransaccionController extends Controller
{

    public function listar()
    {
        try {
             
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function searchById(Request $request)
    {
        try {
             
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function update()
    {
        try {
            

        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }


    public function delete()
    {
        try {
             
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

}