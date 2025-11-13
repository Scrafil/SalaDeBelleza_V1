<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'appointment_id',
        'amount_paid',
        'payment_method',
        'paid_at',
    ];

    // Una transacción pertenece a una cita
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
}