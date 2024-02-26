<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPunto extends Model{
    use HasFactory;

    protected $table = "categorias_puntos";
    protected $primaryKey = "id_categoraP";
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];
}
