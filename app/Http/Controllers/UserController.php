<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Importamos el Modelo Role
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Muestra una lista de los usuarios.
     */
    public function index()
    {
        $users = User::with('role')->paginate(10); // Cargamos la relación role
        return view('users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $roles = Role::all(); // Obtenemos todos los roles para el dropdown
        return view('users.create', compact('roles'));
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => ['required', 'in:CC,TI,PP,CE'],
            'document_number' => 'required|string|max:20|unique:users,document_number',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $userData = $request->except('password_confirmation');
        $userData['password'] = Hash::make($request->password); // Hashing de la contraseña

        User::create($userData);

        return redirect()->route('users.index')
                        ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Actualiza un usuario específico en la base de datos.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => ['required', 'in:CC,TI,PP,CE'],
            // unique:users,document_number,ID_A_EXCLUIR
            'document_number' => ['required', 'string', 'max:20', Rule::unique('users', 'document_number')->ignore($user->id)], 
            'phone_number' => 'nullable|string|max:15',
            // unique:users,email,ID_A_EXCLUIR
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            // La contraseña solo es requerida si se proporciona
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        
        $userData = $request->except(['password_confirmation', 'password']);

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('users.index')
                        ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Elimina un usuario específico de la base de datos.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                        ->with('success', 'Usuario eliminado exitosamente.');
    }
}