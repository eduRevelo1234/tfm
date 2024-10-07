<?php

namespace App\Http\Controllers;
use App\Models\ZonaRiego;
use Illuminate\Http\Request;

class ZonaRiegoController extends Controller
{
    // Obtener todas las zonas de riego
    public function index()
    {
        return ZonaRiego::all();
    }

    // Obtener una zona de riego por ID
    public function show($id)
    {
        return ZonaRiego::findOrFail($id);
    }

    // Crear una nueva zona de riego
    public function store(Request $request)
    {
        $request->validate([
            'nombre_zona' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:255',
            'humedad_min' => 'required|numeric',
            'humedad_max' => 'required|numeric',
            'temperatura_min' => 'required|numeric',
            'temperatura_max' => 'required|numeric',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
        ]);

        $zona = ZonaRiego::create($request->all());

        return response()->json($zona, 201);
    }

    // Actualizar una zona de riego
    public function update(Request $request, $id)
    {
        $zona = ZonaRiego::findOrFail($id);
        $zona->update($request->all());

        return response()->json($zona, 200);
    }

    // Eliminar una zona de riego
    public function destroy($id)
    {
        ZonaRiego::destroy($id);
        return response()->json(null, 204);
    }

    public function dispositivos($id)
    {
        // Buscar la zona de riego por ID
        $zona = ZonaRiego::findOrFail($id);

        // Obtener los dispositivos asociados a esa zona
        $dispositivos = $zona->dispositivos;

        // Devolver la lista de dispositivos en formato JSON
        return response()->json($dispositivos);
    }

}
