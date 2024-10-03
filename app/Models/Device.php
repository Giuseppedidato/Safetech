<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class Device extends Model
{
    use HasFactory;

    // Relazione con azienda (un dispositivo appartiene a una azienda)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relazione con utente (un dispositivo può essere assegnato a un utente)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function uriKey()
    {
        return 'device';
    }
}
