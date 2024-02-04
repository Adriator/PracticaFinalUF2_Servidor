<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelCategoria extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada al modelo en la base de datos
    protected $table = 'categorias';
    
    // Atributos que pueden ser llenados masivamente a través de create y update
    protected $fillable = ['nombre', 'descripcion'];
}
