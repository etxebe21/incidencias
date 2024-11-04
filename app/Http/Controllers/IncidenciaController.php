<?php

namespace App\Http\Controllers;

use App\Models\Incidencia; 
use Illuminate\Http\Request;
use App\Models\User; 


class IncidenciaController extends Controller
{
    
    public function index()
    {
        $incidencias = Incidencia::with('asignadoA')->get();
        return view('incidencias.index', compact('incidencias'));
    }


    public function create()
    {
        $users = User::all(); 
        return view('incidencias.create', compact('users'));
    }

    public function createUserInc( $user)
{
    return view('incidencias.usuarios-create', compact('user'));
}


    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:To Do,Doing,Done', 
            'assigned_to' => 'nullable|exists:users,id', 
        ]);

        $incidencia = new Incidencia;
        $incidencia->titulo = $request->input('titulo');
        $incidencia->descripcion = $request->input('descripcion');
        $incidencia->estado = $request->input('estado');
        $incidencia->assigned_to = $request->input('assigned_to'); 
        $incidencia->created_by = auth()->user()->id; 

        $incidencia->save();

        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada correctamente.');
    }

    public function storeUserInc(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:To Do,Doing,Done', 
            'assigned_to' => 'nullable|exists:users,id', 
        ]);

        $incidencia = new Incidencia;
        $incidencia->titulo = $request->input('titulo');
        $incidencia->descripcion = $request->input('descripcion');
        $incidencia->estado = $request->input('estado');
        $incidencia->assigned_to = $request->input('assigned_to'); 
        $incidencia->created_by = auth()->user()->id; 

        $incidencia->save();

        return redirect()->route('usuarios.incidencias' , ['id' => $incidencia->assigned_to])->with('success', 'Incidencia creada correctamente.');
    }


    public function edit($id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $users = User::all(); // Obtener todos los usuarios
        return view('incidencias.edit', compact('incidencia', 'users'));
    }

    public function editUserInc($id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $users = User::all(); // Obtener todos los usuarios
        return view('incidencias.usuarios-edit', compact('incidencia', 'users'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:To Do,Doing,Done', 
            'assigned_to' => 'required|exists:users,id',
        ]);
 
        $incidencia = Incidencia::findOrFail($id);
        
        $incidencia->titulo = $request->input('titulo');
        $incidencia->descripcion = $request->input('descripcion');
        $incidencia->estado = $request->input('estado'); 
        $incidencia->assigned_to = $request->input('assigned_to');
    
        $incidencia->save();
    
        return redirect()->route('incidencias.index')->with('success', 'Incidencia actualizada correctamente.');
    }

    public function updateUserInc(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|in:To Do,Doing,Done', 
            'assigned_to' => 'required|exists:users,id',
        ]);

        $incidencia = Incidencia::findOrFail($id);

        $incidencia->titulo = $request->input('titulo');
        $incidencia->descripcion = $request->input('descripcion');
        $incidencia->estado = $request->input('estado'); 
        $incidencia->assigned_to = $request->input('assigned_to');

        $incidencia->save();

        return redirect()->route('usuarios.incidencias', ['id' => $incidencia->assigned_to])->with('success', 'Incidencia actualizada correctamente.');
    }

    
    public function destroy(Incidencia $incidencia)
    {
        
        // Lógica para eliminar la incidencia
        $incidencia->delete();

        return redirect()->route('incidencias.index')->with('success', 'Incidencia eliminada con éxito.');
    }

    public function destroyUserInc(Incidencia $incidencia)
    {    
        // Obtener el ID del usuario asignado para redirección
        $userId = $incidencia->assigned_to;

        $incidencia->delete();

        return redirect()->route('usuarios.incidencias', ['id' => $userId])
            ->with('success', 'Incidencia eliminada con éxito.');
    }

}
