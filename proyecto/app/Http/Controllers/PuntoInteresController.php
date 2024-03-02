<?php

namespace App\Http\Controllers;

use App\Http\Resources\PuntoInteresResource;
use App\Models\PuntoInteres;
use Illuminate\Http\Request;

class PuntoInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos = PuntoInteres::all()->load(['trabajos', 'categorias']);
        return new PuntoInteresResource($puntos);
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
    public function show(string $id)
    {
        //
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
