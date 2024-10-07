<?php

namespace App\Http\Controllers;
use App\Models\DispositivoIoT;
use Illuminate\Http\Request;

class DispositivoIoTController extends Controller
{
    // Obtener todos los dispositivos IoT
    public function index()
    {
        return DispositivoIoT::all();
    }

    // Obtener un dispositivo IoT por ID
    public function show($id)
    {
        return DispositivoIoT::findOrFail($id);
    }

    // Crear un nuevo dispositivo IoT
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:50',
            'estado' => 'required|boolean',
            'id_zona' => 'required|exists:zonas_riego,id_zona',
        ]);

        $dispositivo = DispositivoIoT::create($request->all());

        return response()->json($dispositivo, 201);
    }

    // Actualizar un dispositivo IoT
    public function update(Request $request, $id)
    {
        $dispositivo = DispositivoIoT::findOrFail($id);
        $dispositivo->update($request->all());

        return response()->json($dispositivo, 200);
    }

    // Eliminar un dispositivo IoT
    public function destroy($id)
    {
        DispositivoIoT::destroy($id);
        return response()->json(null, 204);
    }

    public function datos($id)
    {
        $dispositivo = DispositivoIoT::findOrFail($id);
        return response()->json($dispositivo->datosSensores);  // Relación en el modelo DispositivoIoT
    }
}
