<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelCarrito extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada al modelo en la base de datos
    protected $table = 'carrito';
    
    // Atributos que pueden ser llenados masivamente a través de create y update
    protected $fillable = ['producto', 'cantidad', 'precio_producto', 'total'];
}
