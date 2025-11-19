<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory; // Necesitamos el modelo
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Muestra una lista de las categorías de servicio.
     */
    public function index()
    {
        $categories = ServiceCategory::paginate(10);
        return view('service_categories.index', compact('categories'));
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     */
    public function create()
    {
        return view('service_categories.create');
    }

    /**
     * Almacena una nueva categoría en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            // La validación asegura que el campo 'name' sea requerido, string, max 255 y único en la tabla.
            'name' => 'required|string|max:255|unique:service_categories,name',
        ]);

        ServiceCategory::create($request->all());

        return redirect()->route('service-categories.index')
            ->with('success', 'Categoría de servicio creada exitosamente.');
    }

    /**
     * Muestra el formulario para editar una categoría.
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        return view('service_categories.edit', compact('serviceCategory'));
    }

    /**
     * Actualiza una categoría específica en la base de datos.
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $request->validate([
            // Excluimos el ID actual de la validación unique para permitir actualizar el nombre sin error.
            'name' => 'required|string|max:255|unique:service_categories,name,' . $serviceCategory->id,
        ]);

        $serviceCategory->update($request->all());

        return redirect()->route('service-categories.index')
            ->with('success', 'Categoría de servicio actualizada exitosamente.');
    }

    /**
     * Elimina una categoría específica de la base de datos.
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        // Nota: En un entorno de producción, es vital revisar si hay servicios asociados antes de eliminar.
        $serviceCategory->delete();
        return redirect()->route('service-categories.index')
            ->with('success', 'Categoría de servicio eliminada exitosamente.');
    }
}
