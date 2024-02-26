<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoInteres extends Model{
    use HasFactory;

    protected $table = "puntos_interes";
    protected $primaryKey = "id_punto_interes";
    public $timestamps = false;

    protected $fillable = [
        'latitud',
        'longitud',
        'nombre',
        'descripcion',
        'id_categoriaP'
    ];
}
