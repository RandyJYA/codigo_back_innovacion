<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaTrabajo extends Model{
    use HasFactory;

    protected $table = "categorias_trabajos";
    protected $primaryKey = "id_categoraT";
    public $timestamps = false;

    protected $fillable = [
        'departamento',
        'curso',
        'descripcion',
    ];
}
