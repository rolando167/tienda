<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';

    protected $fillable = [
        'nombre'
        , 'descripcion'
        , 'cantidad'
        , 'estado'
        , 'id_vendedor'
    ];

}