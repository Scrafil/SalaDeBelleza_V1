<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Importaciones para las relaciones
use App\Models\User;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_id',
        'employee_id',
        'service_id',
        'start_time',
        'end_time',
        'status', 
    ];

    // RELACIONES

    // Relación Muchos-a-Uno: El cliente que hizo la cita
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    // Relación Muchos-a-Uno: El empleado que realiza el servicio
    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    // Relación Muchos-a-Uno: El servicio asociado a la cita
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // Relación Uno-a-Uno: La transacción de pago para esta cita
    public function transaction(): HasOne
    {
        // Transaction debe tener la FK 'appointment_id'
        return $this->hasOne(Transaction::class);
    }
}