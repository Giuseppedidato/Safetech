<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    /**
     * I campi che possono essere assegnati in massa.
     */
    protected $fillable = [
        'name',
        'guard_name',
        'is_safetech_role',
    ];

    /**
     * Cast per il campo is_safetech_role come booleano.
     */
    protected $casts = [
        'is_safetech_role' => 'boolean',
    ];

    /**
     * Query scope per filtrare i ruoli non SafeTech.
     */
    public function scopeNotSafeTech($query)
    {
        return $query->where('is_safetech_role', false);
    }
}









