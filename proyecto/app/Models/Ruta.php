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
        'id_usuario',
        'descripcion',
        'publica'
    ];

    public function puntosInteres(){
        return $this->belongsToMany(PuntoInteres::class, 'formado', 'id_ruta', 'id_punto_interes');
    }

    public function usuarios(){
        return $this->belongsToMany(User::class, 'realiza', 'id_ruta', 'id_usuario');
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }
}
