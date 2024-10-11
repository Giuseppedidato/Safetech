<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, HasRoles;

    // Attributi massivi che possono essere riempiti
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id', // Collegamento all'azienda
    ];

    // Nasconde determinati campi
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    // Aggiunge attributi dinamici al modello
    protected $appends = [
        'profile_photo_url',
    ];

    // Cast automatico di determinati campi
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relazione: un utente può avere molti dispositivi
    public function devices()
    {
        return $this->hasMany(UserDevice::class);
    }

    // Relazione: un utente appartiene a una sola azienda
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relazione: un utente può avere molti abbonamenti
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'user_subscriptions');
    }

    // Verifica se l'utente è amministratore SafeTech
    public function isAdmin(): bool
    {
        return $this->hasRole('SafeTech-admin');
    }

    // Verifica se l'utente è amministratore di un'azienda
    public function isCompanyAdmin(): bool
    {
        return $this->hasRole('company-admin');
    }

    // Verifica se l'utente è un dipendente
    public function isEmployee(): bool
    {
        return $this->hasRole('employee');
    }

    // Implementazione della policy per la visualizzazione dei dati aziendali
    public function canViewCompanyData($company)
    {
        return $this->company_id === $company->id;
    }
}










































































































































