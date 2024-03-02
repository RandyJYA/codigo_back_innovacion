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

    public function categorias(){
        return $this->belongsToMany(CategoriaPunto::class, 'clasifica_puntos', 'id_punto_interes', 'id_categoriaP');
    }

    public function rutas(){
        return $this->belongsToMany(Ruta::class, 'formado', 'id_punto_interes', 'id_ruta');
    }

    public function usuarios(){
        return $this->belongsToMany(User::class, 'visita', 'id_punto_interes', 'id_usuario');
    }

    public function trabajos(){
        return $this->hasMany(Trabajo::class, 'id_punto_interes');
    }
}
