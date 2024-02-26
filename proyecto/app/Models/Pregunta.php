<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model{
    use HasFactory;

    protected $table = "preguntas";
    protected $primaryKey = "id_pregunta";
    public $timestamps = false;

    protected $fillable = [
        'enunciado',
        'id_trabajo'
    ];

    public function respuestas(){
        return $this->hasMany(Respuesta::class, 'id_pregunta');
    }

    public function trabajo(){
        return $this->belongsTo(Trabajo::class, 'id_trabajo');
    }
}
