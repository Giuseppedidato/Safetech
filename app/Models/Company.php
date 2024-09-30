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

    // Relazione con fatture (invoices)
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    // Relazione con pagamenti
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Relazione con le richieste di supporto (support tickets)
    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    // Relazione con i log di attività (audit logs)
    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    public static function uriKey()
    {
        return 'company';
    }
}
