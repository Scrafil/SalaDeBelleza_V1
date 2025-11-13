<?php

namespace App\Http\Controllers;

use App\Models\Role; // Importar el Modelo Role
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Muestra una lista de los roles.
     */
    public function index()
    {
        // Obtiene todos los roles de la base de datos
        $roles = Role::all(); 

        // Retorna la vista 'roles.index' y le pasa la lista de roles
        return view('roles.index', compact('roles'));
    }

    /**
     * Muestra el formulario para crear un nuevo rol.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Almacena un nuevo rol en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'description' => 'nullable|string|max:500',
        ]);

        // 2. Creación del rol en la base de datos
        Role::create($request->all());

        // 3. Redirecciona con un mensaje de éxito
        return redirect()->route('roles.index')
                        ->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Muestra un rol específico (no tan común para roles, pero es parte del CRUD).
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Muestra el formulario para editar un rol.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Actualiza un rol específico en la base de datos.
     */
    public function update(Request $request, Role $role)
    {
        // 1. Validación (se excluye el nombre del rol actual de la regla unique)
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'description' => 'nullable|string|max:500',
        ]);

        // 2. Actualización
        $role->update($request->all());

        // 3. Redirecciona con un mensaje de éxito
        return redirect()->route('roles.index')
                        ->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Elimina un rol específico de la base de datos.
     */
    public function destroy(Role $role)
    {
        // Antes de eliminar un rol, deberíamos verificar si hay usuarios asociados.
        // Por simplicidad, solo eliminamos por ahora.
        $role->delete();

        return redirect()->route('roles.index')
                        ->with('success', 'Rol eliminado exitosamente.');
    }
}