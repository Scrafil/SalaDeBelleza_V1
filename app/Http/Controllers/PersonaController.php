<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::orderBy('name')->paginate(25);
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        // Pasamos una instancia vacía para que la vista _form pueda leer $persona sin errores
        return view('personas.create', ['persona' => new Persona()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'document_type' => 'nullable|in:CC,TI,PP,CE',
            'document_number' => 'nullable|string|max:50',
            'name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'cellphone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'age' => 'nullable|integer|min:0',
        ]);

        // Calcular edad automáticamente si se envió birth_date
        if (!empty($data['birth_date'])) {
            try {
                $data['age'] = Carbon::parse($data['birth_date'])->age;
            } catch (\Exception $e) {
                $data['age'] = null;
            }
        }

        Persona::create($data);

        return redirect()->route('personas.index')->with('success', 'Persona creada.');
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        $data = $request->validate([
            'document_type' => 'nullable|in:CC,TI,PP,CE',
            'document_number' => 'nullable|string|max:50',
            'name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'cellphone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'age' => 'nullable|integer|min:0',
        ]);

        // Calcular edad automáticamente si se envió birth_date
        if (!empty($data['birth_date'])) {
            try {
                $data['age'] = Carbon::parse($data['birth_date'])->age;
            } catch (\Exception $e) {
                $data['age'] = null;
            }
        }

        $persona->update($data);

        return redirect()->route('personas.show', $persona)->with('success', 'Persona actualizada.');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect()->route('personas.index')->with('success', 'Persona eliminada.');
    }
}
