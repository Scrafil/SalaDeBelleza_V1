<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategory;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'name',
        'base_price',
        'duration_minutes',
        'is_active',
        'description', // <-- Añadido
    ];

    // Asegura que is_active y base_price se manejen correctamente como tipos
    protected $casts = [
        'is_active' => 'boolean',
        'base_price' => 'decimal:2',
    ];

    // Un servicio pertenece a una categoría
    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    // Un servicio puede tener muchas citas
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}