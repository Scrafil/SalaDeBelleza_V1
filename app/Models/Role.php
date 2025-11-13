<?php

namespace App\Models;

// Importaciones necesarias:

// IMPORTAR LA CLASE BASE MODEL DE ELOQUENT
use Illuminate\Database\Eloquent\Model; 
// Importar User para la relación
use App\Models\User;
// Importar el tipo de relación HasMany
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model // Ahora Model está definido
{
    // Asegúrate de agregar $fillable para las inserciones, aunque no es la causa del error.
    protected $fillable = ['name', 'description']; 

    public function users(): HasMany
    {
        // Un rol tiene muchos usuarios (FK: role_id)
        return $this->hasMany(User::class);
    }
}