<?php

namespace App\Http\Controllers;

use App\Models\Incidencia; 
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    
    public function index()
    {
        // Cargar incidencias junto con los usuarios asignados
        $incidencias = Incidencia::with('asignadoA')->get();
        return view('incidencias.index', compact('incidencias'));
    }


    public function create()
    {
        return view('incidencias.create'); // Vista para crear una nueva incidencia
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            
        ]);

        Incidencia::create($request->all());

        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada con éxito.');
    }

    public function edit(Incidencia $incidencia)
    {
        return view('incidencias.edit', compact('incidencia')); // Vista para editar una incidencia
    }

    public function update(Request $request, Incidencia $incidencia)
    {
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            
        ]);

        $incidencia->update($request->all());

        return redirect()->route('incidencias.index')->with('success', 'Incidencia actualizada con éxito.');
    }

    public function destroy(Incidencia $incidencia)
    {
        // Lógica para eliminar la incidencia
        $incidencia->delete();

        return redirect()->route('incidencias.index')->with('success', 'Incidencia eliminada con éxito.');
    }
}
