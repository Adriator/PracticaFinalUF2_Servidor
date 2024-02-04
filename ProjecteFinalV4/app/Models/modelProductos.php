<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelProductos extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada al modelo en la base de datos
    protected $table = 'productos';
    
    // Atributos que pueden ser llenados masivamente a través de create y update
    protected $fillable = ['nombre', 'descripcion', 'unidades', 'precio_unitario','categoria'];
}
