<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RutaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Aquí puedes verificar si el usuario tiene permiso para actualizar la ruta.
        // Por ahora, vamos a permitir a todos los usuarios.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $metodo = $this->method();
        if($metodo == 'PUT') {
            return [
                'nombre' => 'required|min:0',
                'duracion' => 'required|min:0',
                'dificultad' =>'required|min:0',
                'imagen' => 'required|min:0',
                'fecha_creacion'=>'required|min:0',
                'descripcion'=>'required|min:0',
                'publica'=>'required|min:0'
            ];
        }
        else {
            return [
                'nombre' => 'sometimes|min:0',
                'duracion' => 'sometimes|min:0',
                'dificultad' =>'sometimes|min:0',
                'imagen' => 'sometimes|min:0',
                'fecha_creacion'=>'sometimes|min:0',
                'descripcion'=>'sometimes|min:0',
                'publica'=>'sometimes|min:0'
            ];
        }
    }
}
