<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Relazione con utenti (un'azienda ha molti utenti)
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Relazione con dispositivi (un'azienda ha molti dispositivi)
    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    // Relazione con abbonamenti (un'azienda può avere più abbonamenti)
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
