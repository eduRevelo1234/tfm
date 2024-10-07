<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importamos Hash para verificar la contraseña
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // Obtener todos los usuarios
    public function index()
    {
        return Usuario::all();
    }

    // Obtener un usuario por ID
    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|string|email|max:100|unique:usuarios',
            'contraseña' => 'required|string|min:8',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->contraseña = bcrypt($request->contraseña); // Encriptar la contraseña
        $usuario->save();

        return response()->json($usuario, 201);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->json(null, 204);
    }

    // Relación con zonas de riego
    public function zonas($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario->zonasRiego);  // Aquí asumes que ya está definida la relación en el modelo Usuario
    }

    // Validar usuario por correo y contraseña
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|string|email',
            'contraseña' => 'required|string',
        ]);

        // Buscar el usuario por correo
        $usuario = Usuario::where('correo', $request->correo)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {
            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso.',
                'id_usuario' => $usuario->id_usuario,  // Puedes devolver el ID del usuario si lo necesitas
            ], 200);
        }

        // Si las credenciales son incorrectas
        return response()->json([
            'success' => false,
            'message' => 'Correo o contraseña incorrectos.',
        ], 401);
    }
}
