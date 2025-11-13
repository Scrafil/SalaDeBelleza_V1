<?php

namespace App\Models;

// Importaciones base de Laravel (debes tenerlas)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Importaciones de tus relaciones
use App\Models\Role;
use App\Models\Appointment;
use App\Models\Expense; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable // Definición de la clase
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'last_name',
        'document_type',
        'document_number',
        'phone_number',
        'email',
        'password',
    ];

    //  RELACIONES DE ELOQUENT 

    public function role(): BelongsTo
    {
        // Un usuario pertenece a un rol (FK: role_id)
        return $this->belongsTo(Role::class);
    }

    public function appointmentsAsClient(): HasMany
    {
        // Un usuario puede ser cliente de muchas citas (FK: client_id)
        return $this->hasMany(Appointment::class, 'client_id');
    }

    public function appointmentsAsEmployee(): HasMany
    {
        // Un usuario puede ser empleado de muchas citas (FK: employee_id)
        return $this->hasMany(Appointment::class, 'employee_id');
    }

    public function expenses(): HasMany
    {
        // Un usuario puede registrar muchos gastos (FK: user_id)
        return $this->hasMany(Expense::class, 'user_id');
    }
    
    // ... el resto de la clase (hidden, casts, etc.)
}