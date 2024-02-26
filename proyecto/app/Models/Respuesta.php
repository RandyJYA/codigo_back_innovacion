<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model{
    use HasFactory;

    protected $table = "respuestas";
    protected $primaryKey = "id_respuesta";
    public $timestamps = false;

    protected $fillable = [
        'id_pregunta',
        'texto',
        'correcta'
    ];
}
