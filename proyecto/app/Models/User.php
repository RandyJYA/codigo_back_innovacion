<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "usuarios";
    public $timestamps = false;
    protected $primaryKey = "id_usuario";
    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'verificado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function puntosInteres(){
        return $this->belongsToMany(PuntoInteres::class, 'visita', 'id_usuario', 'id_punto_interes')->withPivot('completado');
    }

    public function rutas(){
        return $this->belongsToMany(Ruta::class, 'realiza', 'id_usuario', 'id_ruta')->withPivot('completado');
    }

    public function rutasCreadas(){
        return $this->hasMany(Ruta::class, 'id_usuario', 'id_usuario');
    }
}
