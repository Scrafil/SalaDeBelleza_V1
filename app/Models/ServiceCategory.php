<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    use HasFactory;
    
    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'description'];

    // Una categoría tiene muchos servicios
    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}