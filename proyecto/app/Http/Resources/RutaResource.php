<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RutaResource extends JsonResource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nombre' => $this->nombre,
            'duracion' => $this->duracion,
            'dificultad' => $this->dificultad,
            'imagen' => $this->imagen_principal,
            'fecha_creacion'=>$this->fecha_creacion,
            'descripcion'=>$this->descripcion,
            'publica'=>$this->publica,
        ];
    }
}
