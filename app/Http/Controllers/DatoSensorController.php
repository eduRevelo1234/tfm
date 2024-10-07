<?php

namespace App\Http\Controllers;
use App\Models\DatoSensor;
use Illuminate\Http\Request;

class DatoSensorController extends Controller
{
    public function index()
    {
        return DatoSensor::all();
    }

    // Obtener un dato de sensor por ID
    public function show($id)
    {
        return DatoSensor::findOrFail($id);
    }

    // Crear un nuevo dato de sensor
    public function store(Request $request)
    {
        $request->validate([
            'fecha_hora' => 'required|date',
            'valor' => 'required|numeric',
            'tipo_dato' => 'required|string|max:50',
            'id_dispositivo' => 'required|exists:dispositivos_iot,id_dispositivo',
        ]);

        $dato = DatoSensor::create($request->all());

        return response()->json($dato, 201);
    }

    // Actualizar un dato de sensor
    public function update(Request $request, $id)
    {
        $dato = DatoSensor::findOrFail($id);
        $dato->update($request->all());

        return response()->json($dato, 200);
    }

    // Eliminar un dato de sensor
    public function destroy($id)
    {
        DatoSensor::destroy($id);
        return response()->json(null, 204);
    }


}
