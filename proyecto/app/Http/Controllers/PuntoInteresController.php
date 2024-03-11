<?php

namespace App\Http\Controllers;

use App\Http\Resources\PuntoInteresResource;
use App\Models\PuntoInteres;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;


class PuntoInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $token = $request->bearerToken();
        $accessToken = PersonalAccessToken::findToken($token);
        $puntos = PuntoInteres::all()->load(['trabajos', 'categorias']);

        if ($accessToken) {
            $usuario = $accessToken->tokenable;
            $puntosVisitados = $usuario->puntosInteres->map(function ($punto) {
                return [
                    'id_punto' => $punto->id_punto_interes,
                    'completado' => $punto->pivot->completado,
                ];
            });
        } else {
            $puntosVisitados = [];
        }

        return response()->json([
            'puntos' => $puntos,
            'puntosVisitados' => $puntosVisitados
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $token = $request->bearerToken();
        $accessToken = PersonalAccessToken::findToken($token);
        $punto = PuntoInteres::findOrFail($id)->load(['trabajos', 'categorias']);

        if ($accessToken) {
            $usuario = $accessToken->tokenable;
            $puntosVisitados = $usuario->puntosInteres->map(function ($punto) {
                return [
                    'id_punto' => $punto->id_punto_interes,
                    'completado' => $punto->pivot->completado,
                ];
            });
        } else {
            $puntosVisitados = [];
        }
        return response()->json([
            'punto' => $punto,
            'puntosVisitados' => $puntosVisitados
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
