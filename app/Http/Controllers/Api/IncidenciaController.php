<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller {
    
    public function index() {

        $user = auth()->user();
        // Filtrar incidencias según el rol del usuario
        if ($user->hasRole('admin')) {
            // Si es admin, puede ver todas las incidencias
            return response()->json(Incidencia::all(), 200);
        } else if ($user->hasRole('soporte')) {
            // Si es soporte, solo puede ver incidencias asignadas 
            return response()->json(
                Incidencia::where('assigned_to', $user->id)->get(),
                200
            );
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function show($id) {
        $user = auth()->user();
        $incidencia = Incidencia::findOrFail($id);

        // Verificar si el usuario puede ver la incidencia
        if ($user->hasRole('admin') || ($user->hasRole('soporte') && $incidencia->assigned_to == $user->id)) {
            return response()->json($incidencia, 200);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function store(Request $request) {
        // Validación de los datos 
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:To Do,Doing,Done',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        // Asignar el creador como el usuario autenticado
        $data['created_by'] = auth()->id();

        // Crear la incidencia
        $incidencia = Incidencia::create($data);

        return response()->json($incidencia, 201);
    }

    public function update(Request $request, $id) {
        $user = auth()->user();
        $incidencia = Incidencia::findOrFail($id);

        // Autorizar solo a Admin o al usuario de soporte asignado
        if (!$user->hasRole('admin') && $user->id !== $incidencia->assigned_to) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Validación de actualización
        $data = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'estado' => 'sometimes|in:To Do,Doing,Done',
        ]);

        $incidencia->update($data);

        return response()->json($incidencia, 200);
    }

    public function destroy($id) {
        $user = auth()->user();
        $incidencia = Incidencia::findOrFail($id);

        // Solo los administradores pueden eliminar incidencias
        if (!$user->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $incidencia->delete();

        return response()->json(null, 204);
    }
}
