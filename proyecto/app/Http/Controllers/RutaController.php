<?php

namespace App\Http\Controllers;

use App\Http\Resources\RutaResource;
use App\Models\PuntoInteres;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PharIo\Manifest\Author;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $rutas = Ruta::where('publica', true)->get();

        $rutas->load("puntosInteres");

        return $rutas;
    }

    public function agregarPuntoInteres($id_ruta, $id_punto_interes)
{
    $id_usuario = Auth::user()->id_usuario;

    $ruta = Ruta::where('id_ruta', $id_ruta)
                ->where('id_usuario', $id_usuario)
                ->first();

    if($ruta) {
        $puntoInteres = PuntoInteres::findOrFail($id_punto_interes);

        $ruta->puntosInteres()->attach($puntoInteres);

        $nombrePunto = $puntoInteres->nombre;
        $nombreRuta = $ruta->nombre;

        return response()->json(['message' => "$nombrePunto agregado a tu ruta $nombreRuta"], 200);
    } else {
        return response()->json(['message' => 'No se encuentra esta ruta para tu usuario'], 404);
    }
}
public function quitarPuntoInteres($id_ruta, $id_punto_interes)
{
    $id_usuario = Auth::user()->id_usuario;

    $ruta = Ruta::where('id_ruta', $id_ruta)
                ->where('id_usuario', $id_usuario)
                ->first();

    if($ruta) {
        $puntoInteres = PuntoInteres::findOrFail($id_punto_interes);

        if ($ruta->puntosInteres->contains($puntoInteres)) {
            $ruta->puntosInteres()->detach($puntoInteres);

            $nombrePunto = $puntoInteres->nombre;
            $nombreRuta = $ruta->nombre;

            return response()->json(['message' => "$nombrePunto eliminado de tu ruta $nombreRuta"], 200);
        } else {
            return response()->json(['message' => 'El punto de interés no está asociado a esta ruta'], 404);
        }
    } else {
        return response()->json(['message' => 'No se encuentra esta ruta para tu usuario'], 404);
    }
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

    $id_usuario = Auth::id();
    $id_ruta = $ruta->id_usuario;
    if($id_usuario != $id_ruta){
        return response()->json(['message' => 'No se encuentra esta ruta para tu usuario'], 200);
    } else{

        return new RutaResource($ruta);
    }
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
        $rutas = Ruta::where('id_usuario', Auth::user()->id_usuario)->get();

        $rutas->load("puntosInteres");

        return $rutas;

    }

    public function puntosRuta(Ruta $ruta){
        return $ruta->puntosInteres;
    }
}
