<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'ragione_sociale',
        'indirizzo',
        'email',
        'telefono',
        'codice_destinatario',
        'pec',
        'partita_iva',
        'codice_fiscale',
        'contatto_telefono',
        'indirizzo_fatturazione',
        'email_fatturazione',
        'iban',
        'metodo_pagamento',
        'valuta',
    ];

    // Relazioni
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    // Metodo uriKey
    public static function uriKey()
    {
        return 'company';
    }

    public function company()
{
    return $this->belongsTo(Company::class);
}

}
