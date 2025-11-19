<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Muestra una lista de los servicios.
     */
    public function index()
    {
        // Carga la relación 'category' para mostrar el nombre en la tabla
        $services = Service::with('category')->paginate(10);
        return view('services.index', compact('services'));
    }

    /**
     * Muestra el formulario para crear un nuevo servicio.
     */
    public function create()
    {
        $categories = ServiceCategory::all(); // Obtiene las categorías para el dropdown
        return view('services.create', compact('categories'));
    }

    /**
     * Almacena un nuevo servicio en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id', // Verifica que la categoría exista
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric|min:0',
            'duration_minutes' => 'required|integer|min:10',
            'is_active' => 'boolean',
        ]);

        // **CORRECCIÓN CLAVE:** Asegura que 'is_active' se envía como true (1) o false (0)
        $request->merge([
            'is_active' => $request->has('is_active'), 
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un servicio.
     */
    public function edit(Service $service)
    {
        $categories = ServiceCategory::all();
        return view('services.edit', compact('service', 'categories'));
    }

    /**
     * Actualiza un servicio específico en la base de datos.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric|min:0',
            'duration_minutes' => 'required|integer|min:10',
            'is_active' => 'boolean',
        ]);

        // **CORRECCIÓN CLAVE:** Asegura que 'is_active' se envía como true (1) o false (0)
        $request->merge([
            'is_active' => $request->has('is_active'),
        ]);
        
        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Servicio actualizado exitosamente.');
    }

    /**
     * Elimina un servicio específico de la base de datos.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')
            ->with('success', 'Servicio eliminado exitosamente.');
    }
}