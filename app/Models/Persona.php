<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'document_type',
        'document_number',
        'name',
        'last_name',
        'email',
        'cellphone',
        'birth_date',
        'address',
        'age',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'age' => 'integer',
    ];

    // Relaciones (opcional)
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'person_id');
    }

    /**
     * Devuelve la edad calculada desde la fecha de nacimiento.
     * Si birth_date está presente, calcula la edad; de lo contrario, devuelve el valor guardado.
     */
    public function getAgeAttribute($value)
    {
        if ($this->birth_date) {
            try {
                return Carbon::parse($this->birth_date)->age;
            } catch (\Exception $e) {
                // fallback al valor guardado
            }
        }

        return $value;
    }
}
