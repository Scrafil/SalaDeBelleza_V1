<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description',
        'amount',
        'expense_date',
        'category',
        'user_id', // Usuario que registró el gasto
    ];

    // Un gasto fue registrado por un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}