<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Auth; 
use App\Models\Producto;
use App;
use DB;

class Authrepository{


    public function create( $data){
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
