<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model{
    use HasFactory;
    protected $table = "rutas";
    protected $primaryKey = "id_ruta";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'duracion',
        'dificultad',
        'fecha_creacion',
        'imagen_principal',
        'id_usuario'
    ];

}
