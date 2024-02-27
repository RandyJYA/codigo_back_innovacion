<?php

namespace App\Http\Controllers;

use App\Http\Resources\RutaResource;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $rutas = Ruta::whereNull('id_usuario')->paginate(5);
        return $rutas;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $datos['id_usuario'] = $request->user()->id_usuario;

        return new RutaResource(Ruta::create($datos));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruta $ruta){
        return new RutaResource($ruta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, Ruta $ruta)
    {
        $nombre = $ruta->nombre;

        if($ruta->id_usuario !=  Auth::user()->id_usuario){

            return response()->json(["mensaje "=> "no tienes autorizacion para actualizar la ruta de ".$nombre],200);

        }

        else{
            $datos = $request->all();
            $ruta->update($datos);
            return new RutaResource($ruta);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,Ruta $ruta)
    {
        $nombre = $ruta->nombre;
        if($ruta->id_usuario !=  Auth::user()->id_usuario){

            return response()->json(["mensaje "=> "no tienes autorizacion para borrar ",$nombre],200);

        }
        else{
            $ruta->delete();
            return response()->json(["mensaje "=> "Se ha borrado la ruta de ".$nombre],200);
        }
    }

    public function misRutas(Request $request){
        return $request->user()->rutasCreadas;
    }
}
