<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model{
    use HasFactory;

    protected $table = "trabajos";
    protected $primaryKey = "id_trabajo";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'texto',
        'URL',
        'tipo',
        'idioma',
        'movil',
        'id_punto_interes',
        'id_categoriaT'
    ];

    public function preguntas(){
        return $this->hasMany(Pregunta::class, 'id_trabajo');
    }

    public function categorias(){
        return $this->belongsToMany(User::class, 'clasifica_trabajos', 'id_trabajo', 'id_categoriaT');
    }

    public function puntoInteres(){
        return $this->belongsTo(PuntoInteres::class, 'id_punto_interes');
    }
}
