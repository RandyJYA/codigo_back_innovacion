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
}
