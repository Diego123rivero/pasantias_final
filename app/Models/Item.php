<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "item";  // Nombre de la tabla
    protected $primaryKey = "id";  // Clave primaria
    protected $fillable = [
        'categoria',        // categoría (NOT NULL)
        'subcategoria',     // subcategoria (NOT NULL)
        'item',             // item (NOT NULL)
        'marca',            // marca (PUEDE SER NULL)
        'modelo',           // modelo (PUEDE SER NULL)
        'serie',            // serie (PUEDE SER NULL)
        'color',            // color (PUEDE SER NULL)
        'estado',           // estado (NOT NULL)
        'ubicacion',         // ubicacion (NOT NULL)
        'codigo',
        'qr_path'
    ];
    protected $hidden = ['id'];  // Ocultar 'id' en las respuestas
    
    // Relación y otras funciones si las tienes (no se especificaron en la migración)
}
