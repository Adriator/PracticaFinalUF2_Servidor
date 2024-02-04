<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelUsuarios extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada al modelo en la base de datos
    protected $table = 'usuarios';
    
    // Atributos que pueden ser llenados masivamente a través de create y update
    protected $fillable = ['nick','email', 'nombre','apellidos','contra', 'dni','fecha_nacimiento','rol'];
}
